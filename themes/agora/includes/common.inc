<?php
/**
 * Common defines and functions
 */

use Mekit\Drupal7\HookExecutor;
use Mekit\Drupal7\Exception\ThemeException;

/**
 * Setting namespace root for HookExecutor using the name of the current theme
 * like 'mytheme' -> 'Mytheme\'
 */
HookExecutor::setHooksNameSpaceRoot(ucfirst(strtolower($GLOBALS['theme'])) . '\\');


/**
 * defines constant for use in templates: "/sites/agora/themes/agora/agora/"
 */
defined('AGORAPATH') || define('AGORAPATH', '/' . $GLOBALS["theme_path"] . '/agora/');

/**
 * defines constant for use in templates: "/sites/agora/themes/agora/intouch/"
 */
defined('INTOUCHPATH') || define('INTOUCHPATH', '/' . $GLOBALS["theme_path"] . '/intouch/');

