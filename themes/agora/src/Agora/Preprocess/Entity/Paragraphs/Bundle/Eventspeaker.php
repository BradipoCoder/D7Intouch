<?php
/**
 * Created by Adam Jakab.
 * Date: 27/10/16
 * Time: 17.42
 */

namespace Agora\Preprocess\Entity\Paragraphs\Bundle;

use Mekit\Drupal7\HookInterface;

class Eventspeaker implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::fixFieldText($vars);
    }
    
    /**
     * This field is in plaintext format but we need to preserve the newlines
     * @param array $vars
     */
    private static function fixFieldText(&$vars)
    {
        if(isset($vars['content']['field_text'][0]['#markup']))
        {
            $markup = $vars['content']['field_text'][0]['#markup'];
            $markup = nl2br(trim($markup));
            $vars['content']['field_text'][0]['#markup'] = $markup;
        }
    }
}