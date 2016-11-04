<?php
/**
 * Common defines and functions
 */

use Mekit\Drupal7\HookHelper;
use Mekit\Drupal7\Exception\ThemeException;

/**
 * Setting namespace root for HookHelper using the name of the current theme
 * like 'mytheme' -> 'Mytheme\'
 */
HookHelper::setHooksNameSpaceRoot(ucfirst(strtolower($GLOBALS['theme'])) . '\\');


/**
 * defines constant for use in templates: "/sites/agora/themes/agora/agora/"
 */
defined('AGORAPATH') || define('AGORAPATH', '/' . $GLOBALS["theme_path"] . '/agora/');

