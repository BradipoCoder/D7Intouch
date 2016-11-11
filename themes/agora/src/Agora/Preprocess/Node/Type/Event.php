<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Preprocess\Node\Type;

use Agora\Util\ThemeHelper;
use Mekit\Drupal7\HookInterface;
use Stringy\StaticStringy;

/**
 * Class Event
 *
 * @package Agora\Preprocess\Node\Type
 */
class Event implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setupArticleClasses($vars);
        self::addIssueFieldsToContent($vars);
        self::addGoogleCalendarLink($vars);
        self::fixFieldEventLocation($vars);
        self::formatEventDate($vars);
        
        //dpm($vars, "EVENT");
    }
    
    /**
     * @param array $vars
     */
    private static function formatEventDate(&$vars)
    {
        if(isset($vars['field_event_date']))
        {
            $FED = $vars['field_event_date'][0];
            //dpm($FED, "FED");
            //dpm($vars['content']['field_event_date'], "C-FED");
        }
    }
    
    /**
     * @param array $vars
     */
    private static function addGoogleCalendarLink(&$vars)
    {
        $link = "#";
        if(isset($vars['field_event_date'][0]['value']) && isset($vars['field_event_date'][0]['value2']))
        {
            // Title
            $title = $vars["title"];
            
            // Details
            $details = '';
            //$details = 'Event link: ' . url('node/' . $vars["nid"], ['absolute' => true]);
            
            // Location
            $location = "";
            if(isset($vars['field_event_location'][0]['value']))
            {
                $location = $vars['field_event_location'][0]['value'];
            }
    
            // Dates
            $timeZone = new \DateTimeZone($vars['field_event_date'][0]['timezone']);
            $startDate = new \DateTime($vars['field_event_date'][0]['value']);
            $startDate->setTimezone($timeZone);
            $finishDate = new \DateTime($vars['field_event_date'][0]['value2']);
            $finishDate->setTimezone($timeZone);
            
            $link = ThemeHelper::createGoogleCalendarInsertUri($title, $details, $location, $startDate, $finishDate);
        }
        $vars["google_calendar_link"] = $link;
    }
    
    /**
     * This field is in plaintext format but we need to preserve the newlines
     * @param array $vars
     */
    private static function fixFieldEventLocation(&$vars)
    {
        if(isset($vars['content']['field_event_location'][0]['#markup']))
        {
            $markup = $vars['content']['field_event_location'][0]['#markup'];
            $markup = nl2br(trim($markup));
            $vars['content']['field_event_location'][0]['#markup'] = $markup;
        }
    }
    
    /**
     * @param array $vars
     */
    private static function addIssueFieldsToContent(&$vars)
    {
        /** @var \stdClass $node */
        $node = $vars["node"];
    
        $parentNid = false;
        if(isset($node->nodehierarchy_menu_links[0]['pnid']))
        {
            $parentNid = $node->nodehierarchy_menu_links[0]['pnid'];
            $parentNode = node_load($parentNid);
            if($parentNode)
            {
                $vars["content"]["issue_number"] = field_view_field('node', $parentNode, 'field_pubnumber', 'full');
            }
        }
    }
    
    /**
     * @param array $vars
     */
    private static function setupArticleClasses(&$vars)
    {
        $vars["classes_array"][] = 'magazine-article';
    }

}