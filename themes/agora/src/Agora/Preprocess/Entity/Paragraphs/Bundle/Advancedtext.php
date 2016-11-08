<?php
/**
 * Created by Adam Jakab.
 * Date: 02/11/16
 * Time: 16.34
 */

namespace Agora\Preprocess\Entity\Paragraphs\Bundle;

use Mekit\Drupal7\HookInterface;

class Advancedtext implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        //self::doSomething($vars);
        //dpm($vars, "ADVANCED-TEXT");
    }
    
    /**
     * @param array $vars
     */
    private static function doSomething(&$vars)
    {
        //
    }
}