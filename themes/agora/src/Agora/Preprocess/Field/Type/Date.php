<?php
/**
 * Created by Adam Jakab.
 * Date: 27/10/16
 * Time: 17.42
 */

namespace Agora\Preprocess\Field\Type;

use Mekit\Drupal7\HookInterface;

class Date implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::fixEventDate($vars);
        //dpm($vars, "DATE");
    }
    
    private static function fixEventDate(&$vars)
    {
        if($vars['element']['#field_name'] == 'field_event_date')
        {
            //dpm($vars, "EVENT DATE");
        }
    }
    
    
}