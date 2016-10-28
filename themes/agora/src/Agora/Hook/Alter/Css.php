<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Hook\Alter;

use Agora\Hook\Hook;
use Agora\Hook\HookInterface;

/**
 * Class Css
 *
 * @package Agora\Hook\Alter
 */
class Css extends Hook implements HookInterface
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