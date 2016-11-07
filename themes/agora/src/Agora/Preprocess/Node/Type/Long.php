<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Preprocess\Node\Type;

use Mekit\Drupal7\HookInterface;

/**
 * Class Long
 *
 * @package Agora\Preprocess\Node\Type
 */
class Long implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setupArticleClasses($vars);
        self::addIssueFieldsToContent($vars);
        self::addCoverUrl($vars);
        //dpm($vars, "LONG");
        
        
        
    }
    
    /**
     * @param array $vars
     */
    private static function addCoverUrl(&$vars)
    {
        $coverUrl= '';
        if(isset($vars['content']['field_image'][0]['#item']['uri']) && isset($vars['content']['field_image'][0]['#image_style']))
        {
            $coverUrl = image_style_url($vars['content']['field_image'][0]['#image_style'],
                                       $vars['content']['field_image'][0]['#item']['uri']);
        }
        $vars["content"]["cover_url"] = [
            '#markup' => $coverUrl,
        ];
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
    }

}