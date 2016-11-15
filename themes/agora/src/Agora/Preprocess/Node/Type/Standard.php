<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Preprocess\Node\Type;

use Agora\Util\ThemeHelper;
use Mekit\Drupal7\HookInterface;

class Standard implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setupArticleClasses($vars);
        self::addIssueFieldsToContent($vars);
        self::addCoverUrl($vars);
        //dpm($vars["node"], "NODE-STANDARD");
    }
    
    /**
     * @param array $vars
     */
    private static function addCoverUrl(&$vars)
    {
        $coverUrl = '';
        if (isset($vars['content']['field_image'][0]['#item']['uri'])
            && isset($vars['content']['field_image'][0]['#image_style'])
        )
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
        switch ($vars["view_mode"])
        {
            case "full":
                $vars["classes_array"][] = 'magazine-article';
                break;
            case "teaser":
                //$vars["classes_array"][] = 'magazine-article';
                break;
            case "front_mode_1":
            case "front_mode_2":
                $vars["classes_array"][] = 'article-teaser';
                $vars["front_mode_article_container_classes"] = 'col-xs-12 col-sm-6';
                
                //Highlight (exists only in front_mode_1) - first node only
                if($vars["view_mode"] == 'front_mode_1')
                {
                    if(isset($vars["node"]->issue_view_index) && $vars["node"]->issue_view_index == 1)
                    {
                        $vars["classes_array"][] = 'article-teaser--highlight';
                        $vars["front_mode_article_container_classes"] = 'col-xs-12';
                    }
                }
                
                //Article Category Name
                $catName = ThemeHelper::getArticleCategoryNameFromNode($vars["node"]);
                if($catName)
                {
                    $vars["classes_array"][] = 'article-category-' . $catName;
                }
                break;
            default:
                //$vars["classes_array"][] = 'magazine-article';
        }
    }
}