<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Alter;

use Agora\Util\ThemeHelper;
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
        self::addAreaCss($css);
        
        //dpm($css, "CSS-Final");
    }
    
    /**
     * Compiles area specific less files into css and adds them to $css
     * @param $css
     */
    protected static function addAreaCss(&$css)
    {
        $themePath = ThemeHelper::getCurrentThemePath();
        $lessEntryPoint = false;
        
        $area = ThemeHelper::getCurrentArea();
        if($area == ThemeHelper::AREA_AGORA)
        {
            $lessEntryPoint = $themePath . '/agora/style/style.less';
        } else if($area == ThemeHelper::AREA_INTOUCH)
        {
            $lessEntryPoint = $themePath . '/intouch/style/style.less';
        }
    
        if($lessEntryPoint)
        {
            $allCss = drupal_add_css($lessEntryPoint, ['group'=>100, 'every_page' => true]);
            $css[$lessEntryPoint] = $allCss[$lessEntryPoint];
        }
    }
    
    
    /**
     * Remove anything that is not explicitly stated in $keep array
     * @param array $css
     */
    private static function excludeAllNonAgoraStyleSheets(&$css)
    {
        $themePath = ThemeHelper::getCurrentThemePath();
        
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