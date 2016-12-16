<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Preprocess\Node\Type;

use Agora\Util\ThemeHelper;
use Mekit\Drupal7\HookInterface;

class Nlarticle implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setupArticleClasses($vars);
        //self::addNewsletterFieldsToContent($vars);
        self::addContentNavigation($vars);
        self::addContentRelated($vars);
        
        //dpm($vars["node"], "NODE-NLARTICLE");
    }
    
    /**
     * @param array $vars
     */
    private static function addContentNavigation(&$vars)
    {
        $vars["content"]["content-navigation"] = [
            '#markup' => 'NAVIGATION'
        ];
    }
    
    /**
     * @param array $vars
     */
    private static function addContentRelated(&$vars)
    {
        $vars["content"]["content-related"] = [
            '#markup' => 'RELATED'
        ];
    }
    
    
    /**
     * @param array $vars
     */
    private static function addNewsletterFieldsToContent(&$vars)
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
        //Newsletter Category Name
        $catName = ThemeHelper::getArticleCategoryNameFromNode($vars["node"], 'field_news_category');
        
        switch ($vars["view_mode"])
        {
            case "full":
                //single-articles-content products-category main-content
                $vars["classes_array"][] = 'single-articles-content';
                $vars["classes_array"][] = 'category-' . $catName;
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