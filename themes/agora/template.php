<?php
/**
 * Agora Theme for D7
 */

/**
 * Composer autoloader
 */
require_once "vendor/autoload.php";

/**
 * Common methods shared by theme which cannot be included into classes
 * because of D7 methodology
 */
require_once "includes/common.inc";

/**
 * All D7 hooks are registered here
 */
require_once "includes/hooks.inc";
