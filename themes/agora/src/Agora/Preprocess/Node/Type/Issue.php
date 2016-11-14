<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Preprocess\Node\Type;

use Mekit\Drupal7\HookInterface;

class Issue implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        //
    }
    
    /**
     * @param array $vars
     *
     * @return array
     */
    private static function addNHChildrenToContent($vars)
    {
        $children = [];
        
        //nodehierarchy_view_children()
        
        return $children;
    }
}



