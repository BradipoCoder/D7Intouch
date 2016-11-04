<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 20/10/2016
 * Time: 23:28
 */

namespace Agora\Preprocess\Node\Id;

use Mekit\Drupal7\HookInterface;

/**
 * Blog main page
 *
 * Class Node7
 * @package Mekit\Drupal7\Preprocess\Node\Id
 */
class Node7 implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        dsm("This is node 7!");
    }
}