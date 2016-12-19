<?php
/**
 * Created by Adam Jakab.
 * Date: 19/12/16
 * Time: 12.28
 */

namespace Agora\Util;

class NodeHelper
{
    /**
     * Passing vars and not node so we can do all checks in here
     *
     * @param array $vars
     * @return bool|\stdClass
     */
    public static function getParentNodeOfNodeInVars(&$vars)
    {
        $parentNode = false;
        
        if(isset($vars["node"])){
            /** @var \stdClass $node */
            $node = $vars["node"];
            if(isset($node->nodehierarchy_menu_links[0]['pnid']))
            {
                $parentNode = node_load($node->nodehierarchy_menu_links[0]['pnid']);
            }
        }
        
        return $parentNode;
    }
    
}