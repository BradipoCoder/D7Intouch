<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Preprocess;

use Mekit\Drupal7\HookInterface;

class Node implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setThemeHookSuggestions($vars);
        self::setContainerDivClasses($vars);
        self::addEditLink($vars);
        //dpm($vars, "NODE VARS");
    }
    
    /**
     * @param array $vars
     */
    private static function setContainerDivClasses(&$vars)
    {
        $vars['classes_array'][] = 'node-' . $vars['view_mode'];
    }
    
    /**
     * @param array $vars
     */
    private static function addEditLink(&$vars)
    {
        if($vars['view_mode'] == 'full')
        {
            if(user_access('administer nodes')) {
                $node = $vars['node'];
                $vars['content']['admin-buttons'] = array(
                    '#prefix' => '<p>',
                    '#suffix' => '</p>',
                    '#markup' => l('Edit', 'node/' . $node->nid . '/edit'),
                    '#weight' => -1,
                );
            }
        }
    }
    
    /**
     * @param array $vars
     */
    private static function setThemeHookSuggestions(&$vars)
    {
        $vars['theme_hook_suggestions'] = [];
        $vars['theme_hook_suggestions'][] = 'node__' . $vars['view_mode'];
        $vars['theme_hook_suggestions'][] = 'node__' . $vars['view_mode'] . '__' . $vars['nid'];
        $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'];
        $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['nid'];
        $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];
        $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'] . '__' . $vars['nid'];
    }
}