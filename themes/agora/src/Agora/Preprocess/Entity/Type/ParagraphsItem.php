<?php
/**
 * Created by Adam Jakab.
 * Date: 27/10/16
 * Time: 13.18
 */

namespace Agora\Preprocess\Entity\Type;

use Agora\Util\ThemeHelper;
use Mekit\Drupal7\HookInterface;

class ParagraphsItem implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setThemeHookSuggestions($vars);
        self::setupItemClasses($vars);
        //dpm($vars, "PARAGRAPHS ITEM");
    }
    
    /**
     * @param array $vars
     */
    private static function setupItemClasses(&$vars)
    {
        $vars["classes_array"] = [];
        
        if(ThemeHelper::getCurrentArea() == ThemeHelper::AREA_AGORA)
        {
            $vars["classes_array"][] = 'article-module';
            
            if(isset($vars['elements']['#bundle']))
            {
                $bundleName = strtolower($vars['elements']['#bundle']);
                $vars["classes_array"][] = 'module--' . $bundleName;
                if($bundleName == 'imagegallery')
                {
                    $vars["classes_array"][] = 'mobile-fullscreen';
                }
            }
        } else
        {
            //
        }
    }
    
    /**
     * @param array $vars
     */
    private static function setThemeHookSuggestions(&$vars)
    {
        $bundle = $vars['paragraphs_item']->bundle;
        $bundleContextFieldName = $vars['paragraphs_item']->field_name;
        $bundleContextFieldName = str_replace('field_paragraphs_' , '', $bundleContextFieldName);
        $viewMode = $vars['view_mode'];
        
        $vars['theme_hook_suggestions'] = [];
        $vars['theme_hook_suggestions'][] = 'paragraphs_item';
        $vars['theme_hook_suggestions'][] = 'paragraphs_item__' . $bundle;
        $vars['theme_hook_suggestions'][] = 'paragraphs_item__' . $bundle . '__' . $viewMode;
        $vars['theme_hook_suggestions'][] = 'paragraphs_item__' . $bundle . '__' . $bundleContextFieldName;
        $vars['theme_hook_suggestions'][] = 'paragraphs_item__' . $bundle . '__' . $bundleContextFieldName . '__' . $viewMode;
    }
    
    
}