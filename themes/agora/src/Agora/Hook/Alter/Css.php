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
 * Class NodeEdit
 *
 * @package Agora\Hook\Alter\Form
 */
class Css extends Hook implements HookInterface
{
    /**
     * @param array $css
     */
    public static function execute(&$css)
    {
        self::excludeCoreDrupalCss($css);
    }

    /**
     * @param array $css
     */
    private static function excludeCoreDrupalCss(&$css)
    {
        $excludes = [
            'modules/system/system.base.css'        => false,
            'modules/system/system.menus.css'       => false,
            'modules/system/system.messages.css'    => false,
            'modules/system/system.theme.css'       => false,
            'modules/field/theme/field.css'         => false,
            'modules/node/node.css'                 => false,
            'modules/user/user.css'                 => false,
        ];
        $css = array_diff_key($css, $excludes);
    }
}