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
        //self::addContentRelated($vars);
        
        //dpm($vars, "NEWSLETTER");
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
        switch ($vars["view_mode"])
        {
            case "full":
                $vars["classes_array"][] = 'main-content';
                break;
            case "teaser":
                //
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