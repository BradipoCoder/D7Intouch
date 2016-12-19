<?php
/**
 * Created by Adam Jakab.
 * Date: 02/11/16
 * Time: 16.34
 */

namespace Agora\Preprocess\Entity\Paragraphs\Bundle;

use Mekit\Drupal7\HookInterface;

class Attachment implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::addDataToContent($vars);
        dpm($vars, "ATTACHMENT");
    }
    
    
    /**
     * @param array $vars
     */
    private static function addDataToContent(&$vars)
    {
        $description = "";
        if(isset($vars["field_uploadedfile"][0]["description"]))
        {
            $description = $vars["field_uploadedfile"][0]["description"];
        }
    
        $file_uri = "";
        if(isset($vars["field_uploadedfile"][0]["uri"]))
        {
            $file_uri = file_create_url($vars["field_uploadedfile"][0]["uri"]);
        }
        
        
        $vars["content"]["description"] = [
            '#markup' => $description,
        ];
        $vars["content"]["file_uri"] = [
            '#markup' => $file_uri,
        ];
    }
    
}