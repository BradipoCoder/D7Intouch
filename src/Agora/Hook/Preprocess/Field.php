<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Hook\Preprocess;

use Agora\Hook\Hook;
use Agora\Hook\HookInterface;

class Field extends Hook implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setThemeHookSuggestions($vars);
        //dpm($vars, "FIELD VARS");//['theme_hook_suggestions']
    }
    
    /**
     * @param array $vars
     */
    private static function setThemeHookSuggestions(&$vars)
    {
        $vars['theme_hook_suggestions'] = [];
        $vars['theme_hook_suggestions'][] = 'field__' . $vars['element']['#field_type'];
        $vars['theme_hook_suggestions'][] = 'field__' . $vars['element']['#field_type'] . '__' .
            $vars['element']['#field_name'];
    }
}