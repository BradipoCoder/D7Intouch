<?php
/**
 * Created by Adam Jakab.
 * Date: 27/10/16
 * Time: 17.42
 */

namespace Agora\Preprocess\Field\Type;

use Mekit\Drupal7\HookInterface;

class Paragraphs implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        //dpm($vars, "PARAGRAPHS FIELD");
    }
}