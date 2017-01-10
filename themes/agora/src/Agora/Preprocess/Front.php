<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Preprocess;

use Agora\Util\ThemeHelper;
use Mekit\Drupal7\HookInterface;

/**
 * Class Front
 *
 * @package Agora\Preprocess
 */
class Front implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::killNoContentSystemMessage($vars);
        //dpm($vars['page']['content'], "FRONT");
    }
    
    /**
     * @param array $vars
     */
    private static function killNoContentSystemMessage(&$vars)
    {
        if(isset($vars['page']['content']['system_main']['default_message'])) {
            unset($vars['page']['content']['system_main']['default_message']);
        }
    }
}