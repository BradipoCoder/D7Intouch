<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Hook\Preprocess\Node\Type;

use Agora\Hook\Hook;
use Agora\Hook\HookInterface;

class Standard extends Hook implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setupArticleClasses($vars);
        self::addIssueFieldsToContent($vars);
        
        //krumo($vars["content"]);
    }
    
    /**
     * @param array $vars
     */
    private static function addIssueFieldsToContent(&$vars)
    {
        /** @var \stdClass $node */
        $node = $vars["node"];
    
        $parentNid = false;
        if(isset($node->nodehierarchy_menu_links[0]['pnid']))
        {
            $parentNid = $node->nodehierarchy_menu_links[0]['pnid'];
            $parentNode = node_load($parentNid);
            if($parentNode)
            {
                $vars["content"]["issue_number"] = field_view_field('node', $parentNode, 'field_pubnumber', 'full');
            }
        }
    }
    
    /**
     * @param array $vars
     */
    private static function setupArticleClasses(&$vars)
    {
        $vars["classes_array"][] = 'magazine-article';
        if(isset($vars['field_category'][0]['taxonomy_term']->name))
        {
            $categoryName = strtolower($vars['field_category'][0]['taxonomy_term']->name);
            $vars["classes_array"][] = 'category--' . $categoryName;
        }
    }

}