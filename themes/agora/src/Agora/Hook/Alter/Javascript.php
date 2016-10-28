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
 * Class Javascript
 *
 * @package Agora\Hook\Alter
 */
class Javascript extends Hook implements HookInterface
{
    /** @var array */
    private static $keep = [
        'settings',
        'misc/drupal.js',
        'misc/jquery.js',
        /*'misc/jquery.once.js',*/
        /*'sites/all/modules/contrib/devel/devel_krumo_path.js',*/
        'sites/all/modules/custom/kadmin/js/kadmin.js',
    ];
    
    /**
     * @param array $js
     */
    public static function execute(&$js)
    {
        self::excludeAllNonAgoraJavascripts($js);
    }
    
    /**
     * @param array $js
     */
    private static function excludeAllNonAgoraJavascripts(&$js)
    {
        $themePath = drupal_get_path('theme', $GLOBALS['theme']);
        
        //dpm($js, "JS(BEFORE)");
        foreach ($js as $k => $v)
        {
            if (!(in_array($k, self::$keep) || preg_match('#^' . $themePath . '#', $k)))
            {
                unset($js[$k]);
            }
        }
        //dpm($js, "JS(AFTER)");
    }
}