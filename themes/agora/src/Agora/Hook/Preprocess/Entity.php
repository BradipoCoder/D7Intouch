<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Hook\Preprocess;

use Agora\Hook\Hook;
use Agora\Hook\HookInterface;

class Entity extends Hook implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        //dpm($vars, "ENTITY VARS");//['theme_hook_suggestions']
    }
}