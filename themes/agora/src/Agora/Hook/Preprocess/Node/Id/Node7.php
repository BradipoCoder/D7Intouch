<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 20/10/2016
 * Time: 23:28
 */

namespace Agora\Hook\Preprocess\Node\Id;


use Agora\Hook\Hook;
use Agora\Hook\HookInterface;

/**
 * Blog main page
 *
 * Class Node7
 * @package Agora\Hook\Preprocess\Node\Id
 */
class Node7 extends Hook implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        dsm("This is node 7!");
    }
}