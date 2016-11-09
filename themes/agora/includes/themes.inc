<?php
/**
 * The main theme hook for defining theme functions
 */


use Mekit\Drupal7\HookExecutor;
use Mekit\Drupal7\Exception\ThemeException;


/**
 * implements theme_preprocess_image();
 * add class "img-responsive" to all images
 */
function agora_preprocess_image(&$vars) {
    $vars['attributes']['class'][] = 'img-responsive';
}
