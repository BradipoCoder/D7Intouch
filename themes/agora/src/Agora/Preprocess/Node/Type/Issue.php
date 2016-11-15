<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Preprocess\Node\Type;

use Agora\Util\ThemeHelper;
use Mekit\Drupal7\HookInterface;

/**
 * Class Issue
 *
 * @package Agora\Preprocess\Node\Type
 */
class Issue implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setupIssueClasses($vars);
        self::addBackgroundUrl($vars);
        self::addVideoCoverUrl($vars);
        self::addCleanVideoUrl($vars);
        self::setupFrontPageViewIssueChildren($vars);
        
        //dpm($vars, "ISSUE-VARS");
    }
    
    /**
     * @param array $vars
     */
    private static function setupFrontPageViewIssueChildren(&$vars)
    {
        if(in_array($vars["view_mode"], ['front_mode_1','front_mode_2']))
        {
            $vars["content"]["children"] = self::getNodesForIssue($vars["node"], $vars["view_mode"]);
        }
    }
    
    
    /**
     * @todo: move this in Helper class
     * @todo: use multiple
     *
     * Using same view_mode for children as the issue is view as
     *
     * @param \stdClass $issue
     * @param string $viewMode
     *
     * @return array
     */
    private static function getNodesForIssue($issue, $viewMode)
    {
        $children = [];
        $nids = ThemeHelper::NHGetChildrenNids($issue->nid);
        if(count($nids))
        {
            $nodes = node_load_multiple($nids);
            $issueViewIndex = 1;
            foreach($nodes as &$node) {
                $node->issue_view_index = $issueViewIndex++;
            }
            $children = node_view_multiple($nodes, $viewMode);
        }
        
        return $children;
    }
    
    /**
     * @param array $vars
     */
    private static function addCleanVideoUrl(&$vars)
    {
        $url= '';
        if(isset($vars['content']["field_uploadedvideo"]['#items'][0]['uri']))
        {
            $url = file_create_url($vars['content']["field_uploadedvideo"]['#items'][0]['uri']);
        }
        $vars["content"]["video_url"] = [
            '#markup' => $url,
        ];
    }
    
    /**
     * @param array $vars
     */
    private static function addVideoCoverUrl(&$vars)
    {
        $url= '';
        if(isset($vars['content']['field_image_2'][0]['#item']['uri']) && isset($vars['content']['field_image_2'][0]['#image_style']))
        {
            $url = image_style_url($vars['content']['field_image_2'][0]['#image_style'],
                                        $vars['content']['field_image_2'][0]['#item']['uri']);
        }
        $vars["content"]["video_cover_url"] = [
            '#markup' => $url,
        ];
    }
    
    /**
     * @param array $vars
     */
    private static function addBackgroundUrl(&$vars)
    {
        $url= '';
        if(isset($vars['content']['field_image'][0]['#item']['uri']) && isset($vars['content']['field_image'][0]['#image_style']))
        {
            $url = image_style_url($vars['content']['field_image'][0]['#image_style'],
                                        $vars['content']['field_image'][0]['#item']['uri']);
        }
        $vars["content"]["background_url"] = [
            '#markup' => $url,
        ];
    }
    
    /**
     * @param array $vars
     */
    private static function setupIssueClasses(&$vars)
    {
        $vars["classes_array"] = [];
        if(in_array($vars["view_mode"], ['front_mode_1','front_mode_2']))
        {
            $vars["classes_array"][] = 'single-issue';
            if($vars["view_mode"] == 'front_mode_1')
            {
                $vars["classes_array"][] = 'lastest-issue';
            }
        }
    }
}



