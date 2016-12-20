<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Preprocess\Node\Type;

use Agora\Util\NodeHelper;
use Agora\Util\ThemeHelper;
use Mekit\Drupal7\HookInterface;

class Newsletter implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setupArticleClasses($vars);
        self::addChildrenToContent($vars);
        self::addTeaserDataToContent($vars);
        
        //dpm($vars, "NEWSLETTER");
    }
    
    /**
     * @param array $vars
     */
    private static function addTeaserDataToContent(&$vars)
    {
        if($vars["view_mode"] != 'teaser')
        {
            return;
        }
        
        /** @var \stdClass $currentNode */
        $currentNode = $vars["node"];
        
        //LINK
        $vars["content"]["link2newsletter"] = url('node/' . $currentNode->nid);
        
        //BG IMAGE
        $img = $currentNode->field_image[LANGUAGE_NONE][0];
        $vars["content"]["newletter_cover"] = image_style_url('newsletter_cover_horizontal', $img["uri"]);
    }
    
    
    private static function addChildrenToContent(&$vars)
    {
        if($vars["view_mode"] != 'full')
        {
            return;
        }
        

        $childrenLinks = _nodehierarchy_get_children_menu_links($vars["node"]->nid);
        $nids = [];

        foreach($childrenLinks as $childLink)
        {
            $nids[] = $childLink["nid"];
        }

        if(!count($nids))
        {
            return;
        }

        $nodes = node_load_multiple($nids);
        $views = node_view_multiple($nodes, 'teaser', 0, LANGUAGE_NONE);
        
        $vars["content"]["articles"] = $views;
        //dpm($nids, "CHILDREN");
            
        
    }
    
    /**
     * @param array $vars
     */
    private static function setupArticleClasses(&$vars)
    {
        /** @var \stdClass $currentNode */
        $currentNode = $vars["node"];
        
        switch ($vars["view_mode"])
        {
            case "full":
                $vars["classes_array"][] = 'main-content';
                break;
            case "teaser":
                $context = menu_get_object();
                if ($context && $context->nid == $currentNode->nid){
                    $vars["classes_array"][] = 'active';
                }
                break;
            case "navbar":
                //
                break;
            case "front_mode_1":
            case "front_mode_2":
                //
                break;
            default:
                //
        }
    }
}