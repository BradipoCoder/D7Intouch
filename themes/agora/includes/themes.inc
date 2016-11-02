<?php

/**
 * The main theme hook for defining theme functions
 */
function agora_theme()
{
    $themePath = drupal_get_path('theme', $GLOBALS['theme']);
    return [
        'article_navbar' => [
            'template' => 'article-navbar',
            'pattern'   => 'article-navbar__',
            'path'      => $themePath . '/templates/navbar',
            'variables' => [
                'backlink' =>       NULL,
                'issue' =>          NULL,
                'article_title' =>  NULL,
            ],
        ],
    ];
}


/**
 * Implements hook_process_themehook()

function seixml_preprocess_exercise(&$vars){
    $vars['class'] = '';
    if (isset($vars['ex_classes_array'])){
        $vars['class'] = implode($vars['ex_classes_array'], ' ');
    }
}
*/