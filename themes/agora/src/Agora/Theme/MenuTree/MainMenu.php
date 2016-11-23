<?php
/**
 * Created by Adam Jakab.
 * Date: 23/11/16
 * Time: 9.30
 */

namespace Agora\Theme\MenuTree;

use Mekit\Drupal7\HookInterface;

class MainMenu implements HookInterface
{
    /**
     * @param array $vars
     * @return array
     */
    public static function execute($vars)
    {
        $menu = [
            '#prefix' => '<div class="agora-header navbar navbar-default"><div class="container-fluid">',
            '#suffix' => '</div></div>',
            'header'  => self::getHeader($vars),
            'menu'    => self::getMenu($vars),
        ];
        
        return drupal_render($menu);
    }
    
    /**
     * @param array $vars
     * @return array
     */
    private static function getHeader($vars)
    {
        return [
            '#prefix' => '<div class="navbar-header">',
            '#suffix' => '</div>',
            'mobile-toggler' => [
                '#prefix' => '<button type="button" class="navbar-toggle">',
                '#suffix' => '</button>',
                'spans' => [
                    's1' => ['#markup' => '<span class="sr-only">Toggle navigation</span>'],
                    's2' => ['#markup' => '<span class="icon-bar"></span>'],
                    's3' => ['#markup' => '<span class="icon-bar"></span>'],
                    's4' => ['#markup' => '<span class="icon-bar"></span>'],
                ]
            ],
            'agora-logo' => [
                '#prefix' => '<a class="navbar-brand" href="#">',
                '#suffix' => '</a>',
                '#markup' => '<img src="images/logo_agora.png" width="113">',
            ],
        ];
    }
    
    /**
     * @param array $vars
     * @return array
     */
    private static function getMenu($vars)
    {
        return [
            '#prefix' => '<nav class="macro-menu">',
            '#suffix' => '</nav>',
            'menu' => self::getMainMenu($vars),
        ];
    }
    
    /**
     * @param array $vars
     * @return array
     */
    private static function getMainMenu($vars)
    {
        return [
            '#prefix' => '<ul class="nav navbar-nav">',
            '#suffix' => '</ul>',
            '#markup' => $vars['tree'],
        ];
    }
}