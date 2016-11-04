<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Alter;

use Mekit\Drupal7\HookInterface;

/**
 * Class Css
 *
 * @package Mekit\Drupal7\Alter
 */
class Css implements HookInterface
{
    /** @var array */
    private static $keep = [
        'sites/all/libraries/fontawesome/css/font-awesome.css',
        'sites/all/modules/custom/kadmin/less/basic.css.less',
    ];
    
    /**
     * @param array $css
     */
    public static function execute(&$css)
    {
        self::excludeAllNonAgoraStyleSheets($css);
    }
    
    /**
     * @param array $css
     */
    private static function excludeAllNonAgoraStyleSheets(&$css)
    {
        $themePath = drupal_get_path('theme', $GLOBALS['theme']);
        
        //dpm($css, "CSS(BEFORE)");
        foreach ($css as $k => $v)
        {
            if (!(in_array($k, self::$keep) || preg_match('#^' . $themePath . '#', $k)))
            {
                unset($css[$k]);
            }
        }
        //dpm($css, "CSS(AFTER)");
    }
}