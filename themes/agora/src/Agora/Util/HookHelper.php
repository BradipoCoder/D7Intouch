<?php
/**
 * Created by Adam Jakab.
 * Date: 27/07/15
 * Time: 11.02
 */

namespace Agora\Util;

use Agora\Exception\HookException;
use Agora\Exception\ThemeException;
use Agora\Hook\Hook;
use Stringy\StaticStringy as S;

class HookHelper
{
    /** @var string */
    public static $themeName = "dimagrimondo";
    
    /** @var string */
    protected static $hooksNameSpaceRoot = "Agora\\Hook\\";

    /**
     * Executes a series of hooks on Nodes
     *
     * @param array $hookNameParts
     * @param array $arguments
     *
     * @throws HookException
     */
    public static function executeNodeHooks(array $hookNameParts, array $arguments = [])
    {
        HookHelper::executeGenericHook($hookNameParts, $arguments);
        if(isset($arguments[0]['node']))
        {
            /** @var \stdClass $node */
            $node = $arguments[0]['node'];

            //Execute a hook for a specific node type
            if(isset($node->type))
            {
                $hookNamePartsType = array_merge($hookNameParts, ['type', $node->type]);
                HookHelper::executeGenericHook($hookNamePartsType, $arguments, true);
            }

            //Execute a hook for a specific node id
            if(isset($node->nid))
            {
                $hookNamePartsId = array_merge($hookNameParts, ['id', 'node' . $node->nid]);
                HookHelper::executeGenericHook($hookNamePartsId, $arguments, true);
            }
        }
    }
    
    /**
     * Executes a series of hooks on Fields
     *
     * @param array $hookNameParts
     * @param array $arguments
     *
     * @throws HookException
     */
    public static function executeFieldHooks(array $hookNameParts, array $arguments = [])
    {
        HookHelper::executeGenericHook($hookNameParts, $arguments);
    
        //Execute a hook for a specific type
        if(isset($arguments[0]['element']['#field_type']))
        {
            $type = $arguments[0]['element']['#field_type'];
            $hookNamePartsType = array_merge($hookNameParts, ['type', $type]);
            HookHelper::executeGenericHook($hookNamePartsType, $arguments, true);
        }
    }
    
    /**
     * Executes a series of hooks on Entities
     *
     * @param array $hookNameParts
     * @param array $arguments
     *
     * @throws HookException
     */
    public static function executeEntityHooks(array $hookNameParts, array $arguments = [])
    {
        HookHelper::executeGenericHook($hookNameParts, $arguments);
    
        //Execute a hook for a specific type
        if(isset($arguments[0]['entity_type']))
        {
            $type = $arguments[0]['entity_type'];
            $hookNamePartsType = array_merge($hookNameParts, ['type', $type]);
            HookHelper::executeGenericHook($hookNamePartsType, $arguments, true);
        }
    }

    /**
     * @param array $hookNameParts
     * @param array $arguments
     * @param bool $ignoreExceptions
     * @param bool $debug
     *
     * @return mixed
     *
     * @throws HookException
     */
    public static function executeGenericHook(array $hookNameParts, array $arguments = [], $ignoreExceptions = false, $debug = false)
    {
        $answer = false;
        try{
            $answer = self::callHookExecute($hookNameParts, $arguments);
        } catch(HookException $e)
        {
            if(!$ignoreExceptions)
            {
                throw $e;
            }
            if($debug)
            {
                dsm("Hook Execution Error: " . $e->getMessage());
            }
        }
        return $answer;
    }

    /**
     * @param array $hookNameParts
     * @param array $arguments
     * @return mixed
     */
    protected static function callHookExecute(array $hookNameParts, array $arguments = [])
    {
        $hookClassPath = HookHelper::resolveToClassPath($hookNameParts);
        return call_user_func_array([$hookClassPath, "execute"], $arguments);
    }

    /**
     * @param array $hookNameParts
     * @return string
     * @throws HookException
     */
    protected static function resolveToClassPath(array $hookNameParts)
    {
        if (!count($hookNameParts))
        {
            throw new HookException("Empty array provided!");
        }
        
        foreach ($hookNameParts as &$hookNamePart)
        {
            $hookNamePart = S::upperCamelize($hookNamePart);
        }

        $hookClassPath = self::$hooksNameSpaceRoot . implode("\\", $hookNameParts);

        if (!class_exists($hookClassPath)){
            throw new HookException("Class '".$hookClassPath."' does not exist!");
        }

        $extendClass = self::$hooksNameSpaceRoot . 'Hook';
        if(!in_array($extendClass, class_parents($hookClassPath))) {
            throw new HookException("Class($hookClassPath) must extend $extendClass!");
        }

        $implementClass = self::$hooksNameSpaceRoot . 'HookInterface';
        if(!in_array($implementClass, class_implements($hookClassPath))) {
            throw new HookException("Class($hookClassPath) must implement $implementClass!");
        }

        return $hookClassPath;
    }
}