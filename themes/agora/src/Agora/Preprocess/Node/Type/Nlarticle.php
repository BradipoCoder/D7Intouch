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

class Nlarticle implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setupArticleClasses($vars);
        self::addContentNavigation($vars);
        self::addContentRelated($vars);
        self::addTeaserDataToContent($vars);
        
        //$vars["content"]["issue_number"] = field_view_field('node', $parentNode, 'field_pubnumber', 'full');
        
        
        //dpm($vars["node"], "NODE-NLARTICLE");
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
        
        $vars["content"]["link2article"] = url('node/' . $currentNode->nid);
    }
    
    
    /**
     * @param array $vars
     */
    private static function addContentNavigation(&$vars)
    {
        if($vars["view_mode"] != 'full')
        {
            return;
        }
        
        /** @var \stdClass $currentNode */
        $currentNode = $vars["node"];
        $previousNode = false;
        $nextNode = false;
        $newsletterNumber = 0;
        if($parentNode = NodeHelper::getParentNodeOfNodeInVars($vars))
        {
            $newsletterNumber = $parentNode->title;
            //dpm($parentNode, "PN");
            $childrenLinks = _nodehierarchy_get_children_menu_links($parentNode->nid);
            $childrenCount = count($childrenLinks);
            $currentNodeIndex = 0;
            
            /** @var \stdClass $childLink */
            foreach($childrenLinks as $childLink)
            {
                if($childLink["nid"] == $currentNode->nid) {
                    break;
                }
                $currentNodeIndex++;
            }

            if($childrenCount > 1) {
                $previousNodeIndex = $currentNodeIndex >= 1 ? $currentNodeIndex - 1 : ($childrenCount-1);
                $NHL = $childrenLinks[$previousNodeIndex];
                $previousNode = url($NHL["link_path"]);
                
                
                $nextNodeIndex = $currentNodeIndex < ($childrenCount-1) ? $currentNodeIndex + 1 : 0;
                $NHL = $childrenLinks[$nextNodeIndex];
                $nextNode = url($NHL["link_path"]);
            }
    
            //dsm("CNT($childrenCount) - PREV($previousNodeIndex) // CURR($currentNodeIndex) // NEXT($nextNodeIndex)");
        }
        
        
        $vars["content"]["content-navigation"] = [
            'previous_node_link' => $previousNode,
            'next_node_link' => $nextNode,
            'newsletter_number' => $newsletterNumber,
        ];
    }
    
    
    /**
     * @param array $vars
     */
    private static function addContentRelated(&$vars)
    {
        if($vars["view_mode"] != 'full')
        {
            return;
        }
        
        $vars["content"]["content-related"] = [
            '#markup' => 'RELATED',
        ];
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
                //$vars["classes_array"] = [];
                $vars["classes_array"][] = 'single-articles-content';
                $vars["classes_array"][] = 'category-' . $catName;
                $vars["classes_array"][] = 'main-content';
                break;
            case "teaser":
                //class="article-card category-products_innovation"
                $vars["classes_array"] = [];
                $vars["classes_array"][] = 'article-card';
                $vars["classes_array"][] = 'category-' . $catName;
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