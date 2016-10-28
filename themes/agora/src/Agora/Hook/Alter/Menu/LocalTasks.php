<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Hook\Alter\Menu;

use Agora\Hook\Hook;
use Agora\Hook\HookInterface;

class LocalTasks extends Hook implements HookInterface
{
    /**
     * @param array $data
     * @param array $router_item
     * @param string $root_path
     */
    public static function execute(&$data, $router_item, $root_path)
    {
        self::ensureCorrectTabsCount($data);
    }

    /**
     * must be set to correct count otherwise buttons don't show up
     * @param array $data
     */
    private static function ensureCorrectTabsCount(&$data)
    {
        if (isset($data['tabs'][0]['output'])) {
            $data['tabs'][0]['count'] = count($data['tabs'][0]['output']);
        }
    }
    
}