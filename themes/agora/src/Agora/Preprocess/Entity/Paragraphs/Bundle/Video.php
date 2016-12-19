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
        self::addVideoDescriptionToContent($vars);
        self::addCleanVideoUrlToContent($vars);
        self::addPlayerMarkupToContent($vars);
        self::addProviderNameToContent($vars);
        //dpm($vars, "VIDEO");
    }
    
    /**
     * @param array $vars
     */
    private static function addVideoDescriptionToContent(&$vars)
    {
        $description = '';
        
        if(isset($vars["field_video"][0]["description"]))
        {
            $description = $vars["field_video"][0]["description"];
        }

        $vars["content"]["video_description"] = [
            '#markup' => $description,
        ];
    }
    
    
    /**
     * @param array $vars
     */
    private static function addPlayerMarkupToContent(&$vars)
    {
        $playerMarkup = '';
    
        if(isset($vars["field_video"][0]["video_data"]))
        {
            $data = unserialize($vars["field_video"][0]["video_data"]);
            if(isset($data["html"]))
            {
                $playerMarkup = $data["html"];
            }
        }
        
        //width="550" height="354"
        $playerMarkup = preg_replace('# width="[0-9]*" #i', ' width="550" ', $playerMarkup);
        $playerMarkup = preg_replace('# height="[0-9]*" #i', ' height="354" ', $playerMarkup);
        
        $vars["content"]["player"] = [
            '#markup' => $playerMarkup,
        ];
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
    
    /**
     * @param array $vars
     */
    private static function addProviderNameToContent(&$vars)
    {
        $providerName = "youtube";
        if(isset($vars["field_video"][0]["video_data"]))
        {
            $data = unserialize($vars["field_video"][0]["video_data"]);
            if(isset($data["provider_name"]))
            {
                $providerName = strtolower($data["provider_name"]);
            }
        }
        
        $vars["content"]["provider_name"] = [
            '#markup' => $providerName,
        ];
    }
    
}