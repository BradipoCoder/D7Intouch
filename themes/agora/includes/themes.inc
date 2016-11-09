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
        'article_navbar' => [
            'template' => 'article-navbar',
            'pattern'   => 'article_navbar__',
            'path'      => $themePath . '/templates/navbar',
            'variables' => [
                'node_type' =>      NULL,
                'backlink' =>       NULL,
                'issue' =>          NULL,
                'article_title' =>  NULL,
            ],
        ],
    ];
}

function agora_preprocess_article_navbar(&$vars) {
    $vars['theme_hook_suggestions'] = [];
    if(isset($vars["node_type"]))
    {
        $vars['theme_hook_suggestions'][] = 'article_navbar__' . $vars["node_type"];
        $vars['theme_hook_suggestions'][] = 'article_navbar__' . $vars["node_type"] . '__daiii';
    }

    //dpm($vars, "PP_NAVBAR");
}

/**
 * implements theme_preprocess_image();
 * add class "img-responsive" to all images
 */
function agora_preprocess_image(&$vars) {
    $vars['attributes']['class'][] = 'img-responsive';
}
