<?php

use Mekit\Drupal7\HookExecutor;
use Mekit\Drupal7\Exception\ThemeException;

/**
 * The main theme hook for defining theme functions
 */
function agora_theme()
{
    $themePath = drupal_get_path('theme', $GLOBALS['theme']);
    return [
        'articlenavbar' => [
            'template' =>  'articlenavbar',
            'pattern'   => 'articlenavbar__',
            'path'      => $themePath . '/templates/navbar',
            'variables' => [
                'node_type' =>      NULL,
                'pippo' =>          NULL,
                'backlink' =>       NULL,
                'issue' =>          NULL,
                'article_title' =>  NULL,
            ],
        ],
    ];
}


function agora_preprocess_articlenavbar(&$vars) {
    //dpm($vars, "PP_NAVBAR-1");
    
    $vars['theme_hook_suggestions'] = [];
    if(isset($vars["node_type"]))
    {
        $vars['theme_hook_suggestions'][] = 'articlenavbar__' . $vars["node_type"];
        $vars['theme_hook_suggestions'][] = 'articlenavbar__' . $vars["node_type"] . '__daiiixxxx';
    }

    //dpm($vars, "PP_NAVBAR-2");
}


/**
 * implements theme_preprocess_image();
 * add class "img-responsive" to all images
 */
function agora_preprocess_image(&$vars) {
    $vars['attributes']['class'][] = 'img-responsive';
}
