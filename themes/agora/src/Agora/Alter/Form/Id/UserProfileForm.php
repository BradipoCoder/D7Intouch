<?php
/**
 * Created by Adam Jakab.
 * Date: 06/03/17
 * Time: 12.43
 */

namespace Agora\Alter\Form\Id;

use Mekit\Drupal7\HookInterface;


class UserProfileForm implements HookInterface
{
    /**
     * @param array $form
     * @param array $form_state
     */
    public static function execute(&$form, &$form_state)
    {
        $form['#submit'][] = ['\Agora\Alter\Form\Id\UserProfileForm', 'customSubmit'];
    }
    
    public static function customSubmit($form, &$form_state)
    {
        drupal_goto(url('<front>'));
    }
    
}


