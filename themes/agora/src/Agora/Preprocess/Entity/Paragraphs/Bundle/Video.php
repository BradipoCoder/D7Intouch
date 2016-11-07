<?php
/**
 * Created by Adam Jakab.
 * Date: 02/11/16
 * Time: 16.34
 */

namespace Agora\Preprocess\Entity\Paragraphs\Bundle;

use Mekit\Drupal7\HookInterface;

class Video implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::addCleanVideoUrlToContent($vars);
        dpm($vars, "VIDEO");
    }
    
    /**
     * @param array $vars
     */
    private static function addCleanVideoUrlToContent(&$vars)
    {
        $cleanVideoUrl = '';
        if(isset($vars["field_video"][0]["video_url"]))
        {
            $cleanVideoUrl = $vars["field_video"][0]["video_url"];
        }
        $vars["content"]["clean_video_url"] = [
            '#markup' => $cleanVideoUrl,
        ];
    }
}