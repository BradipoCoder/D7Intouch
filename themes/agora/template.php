<?php
/**
 * Agora Theme for D7
 */

/**
 * Composer autoloader
 */
require_once __DIR__ . "/vendor/autoload.php";

/**
 * Common methods shared by theme which cannot be included into classes
 * because of D7 methodology
 */
require __DIR__ . "/includes/common.inc";

/**
 * All D7 hooks are registered here
 */
require_once __DIR__ . "/includes/hooks.inc";

/**
 * Theme functions
 */
require_once __DIR__ . "/includes/themes.inc";
