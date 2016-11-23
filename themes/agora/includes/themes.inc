<?php
/**
 * The main theme hook for defining theme functions
 */


use Mekit\Drupal7\HookExecutor;
use Mekit\Drupal7\Exception\ThemeException;


/**
 * implements theme_preprocess_image();
 * add class "img-responsive" to all images
 *
 * @param array $vars
 */
function agora_preprocess_image(&$vars) {
    $vars['attributes']['class'][] = 'img-responsive';
}

/**
 * At the moment it is not used but can remain here beacuse implementation can be useful for custom menu theming
 *
 * implements theme_menu_tree();
 *
 * @param array $vars
 * @return string
 */
function agora_menu_tree($vars) {
    $answer = '';
    
    if(isset($vars["theme_hook_original"]) && preg_match('/^menu_tree__(.*)$/', $vars["theme_hook_original"], $m))
    {
        if(isset($m[1]))
        {
            $menuName = $m[1];
            $answer = HookExecutor::executeGenericHook(['theme', 'menu_tree', $menuName], [$vars], true);
        }
    }
    
    //fallback
    if(!$answer && isset($vars["tree"]))
    {
        $answer = '<ul class="menu">' . $vars['tree'] . '</ul>';
    }
    
    return $answer;
}