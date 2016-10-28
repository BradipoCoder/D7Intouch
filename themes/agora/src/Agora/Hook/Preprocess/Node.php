<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Hook\Preprocess;

use Agora\Hook\Hook;
use Agora\Hook\HookInterface;

class Node extends Hook implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setThemeHookSuggestions($vars);
        self::setContainerDivClasses($vars);
        //dpm($vars['theme_hook_suggestions'], "NODE VARS");
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