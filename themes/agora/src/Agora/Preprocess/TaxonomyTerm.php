<?php
/**
 * Created by Adam Jakab.
 * Date: 20/12/16
 * Time: 17.25
 */

namespace Agora\Preprocess;

use Mekit\Drupal7\HookInterface;
use Stringy\StaticStringy;

/**
 * Class TaxonomyTerm
 *
 * @package Agora\Preprocess
 */
class TaxonomyTerm implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setupClasses($vars);
        self::addTeaserDataToContent($vars);
        
        //dpm($vars, "TAXONOMY TERM");
    }
    
    /**
     * @param array $vars
     */
    private static function addTeaserDataToContent(&$vars)
    {
        if($vars["view_mode"] != 'teaser')
        {
            return;
        }
        
        /** @var \stdClass $currentTerm */
        $currentTerm = $vars["term"];
        
        //LINK
        $vars["content"]["link2term"] = url('newsletter/topic/' . $vars["tid"]);
        
        //TOPIC ID
        $vars["content"]["topic_id"] = $vars["tid"];
    }
    
    
    /**
     * @param array $vars
     */
    private static function setupClasses(&$vars)
    {
        $topicTitle = $vars["name_field"][0]["value"];
        $topicClass = 'topic_' . StaticStringy::underscored(transliteration_clean_filename($topicTitle));
        $activeTopic = false;
        if (arg(0) == "newsletter" && arg(1) == "topic")
        {
            $tid = arg(2);
            if($tid && $vars["tid"] == $tid)
            {
                $activeTopic = true;
            }
        }
        
        switch ($vars["view_mode"])
        {
            case "full":
                //$vars["classes_array"][] = 'magazine-article';
                break;
            case "teaser":
                $vars["classes_array"][] = $topicClass;
                if($activeTopic)
                {
                    $vars["classes_array"][] = 'active';
                }
                break;
            default:
                //
        }
    }
}