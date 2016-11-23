<?php
/**
 * Created by Adam Jakab.
 * Date: 23/11/16
 * Time: 9.30
 */

namespace Agora\Theme\MenuTree;

use Mekit\Drupal7\HookInterface;

class MenuMagazineMenu implements HookInterface
{
    /**
     * @param array $vars
     * @return array
     */
    public static function execute($vars)
    {
        $menuTree = self::addUlToMenu($vars['tree']);
        //dpm($menuTree, "MT");
        return drupal_render($menuTree);
    }

    /**
     * @param array $vars
     *
     * @return array
     */
    private static function addUlToMenu($vars)
    {
        return [
            '#prefix' => '<ul class="menu">',
            '#suffix' => '</ul>',
            '#markup' => $vars['tree'],
        ];
    }
}