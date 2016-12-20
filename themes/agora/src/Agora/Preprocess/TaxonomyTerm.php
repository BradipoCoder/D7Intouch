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
    
        $topicTitle = $vars["name_field"][0]["value"];
        $vars["content"]["topic_id"] = $vars["tid"];
        $vars["content"]["topic_class"] = 'topic_' . StaticStringy::underscored(transliteration_clean_filename
                                                                            ($topicTitle));
    }
}