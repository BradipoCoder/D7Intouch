<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Hook\Preprocess;

use Agora\Hook\Hook;
use Agora\Hook\HookInterface;

class Page extends Hook implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::killNoContentSystemMessage($vars);
        //dpm($vars, "PAGE VARS");
    }
    
    private static function killNoContentSystemMessage(&$vars)
    {
        if (drupal_is_front_page()) {
            if(isset($vars['page']['content']['system_main']['default_message'])) {
                unset($vars['page']['content']['system_main']['default_message']);
            }
        }
    }

}