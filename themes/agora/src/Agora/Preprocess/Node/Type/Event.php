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

class Event implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setupArticleClasses($vars);
        self::addIssueFieldsToContent($vars);
        self::fixFieldEventLocation($vars);
        self::addGoogleCalendarLink($vars);
        
        //dpm($vars, "EVENT");
    }
    
    
    /**
     * create a link like this:
     * https://www.google.com/calendar/render?
     *      action=TEMPLATE
     *      &text=Your+Event+Name
     *      &dates=20140127T224000Z/20140320T221500Z
     *      &details=For+details,+link+here:+http://www.example.com
     *      &location=Waldorf+Astoria,+301+Park+Ave+,+New+York,+NY+10022
     *      &sf=true
     *      &output=xml
     *
     * @see: http://stackoverflow.com/questions/10488831/link-to-add-to-google-calendar
     * @see: http://stackoverflow.com/questions/22757908/google-calendar-render-action-template-parameter-documentation
     *
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
            $startDate = new \DateTime($vars['field_event_date'][0]['value'], $timeZone);
            $finishDate = new \DateTime($vars['field_event_date'][0]['value2'], $timeZone);
            
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