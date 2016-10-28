<?php
/**
 * Created by Adam Jakab.
 * Date: 27/10/16
 * Time: 17.42
 */

namespace Agora\Hook\Preprocess\Field\Type;

use Agora\Hook\Hook;
use Agora\Hook\HookInterface;

class Image extends Hook implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        //dpm($vars, "IMG");
    }
}