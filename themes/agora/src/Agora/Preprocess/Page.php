<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Preprocess;

use Agora\Util\ThemeHelper;
use Mekit\Drupal7\HookInterface;

/**
 * Class Page
 *
 * @package Agora\Preprocess
 */
class Page implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setThemeHookSuggestions($vars);
        self::generateContentSpecificNavbar($vars);
        
        //dpm($vars, "PAGE VARS");
    }
    
    
    /**
     * @param array $vars
     */
    private static function generateContentSpecificNavbar(&$vars)
    {
        $hasNavigation = false;
        if(isset($vars["node"]))
        {
            /** @var \stdClass $node */
            $node = $vars["node"];
            if(in_array($node->type, ["standard", "long", "event"]))
            {
                self::generateArticleNavbar($vars);
                $hasNavigation = true;
            } else if(in_array($node->type, ["nlarticle"]))
            {
                self::generateNewsletterArticleNavbar($vars);
                $hasNavigation = true;
            }
        }
        
        //fallback to main navigation
        if(!$hasNavigation)
        {
            self::generateMainNavbar($vars);
        }
    }
    
    /**
     * Generic navigation bar for site
     * @param array $vars
     */
    private static function generateMainNavbar(&$vars)
    {
        
        $agoraNavGen = [
            '#theme' => 'agoranav_generic',
            '#pagevars' => null,
            '#settings' => [
                'latest-articles-markup' => ThemeHelper::getView("navigation_latest_news", "block"),
                'latest-issues-markup' => ThemeHelper::getView("navigation_last_issues", "block"),
            ],
        ];
        
        $vars['page']['main_header']['agora-main-navbar'] = $agoraNavGen;
    }
    
    
    /**
     * Header side-bar for single newsletter article node
     * @param array $vars
     */
    private static function generateNewsletterArticleNavbar(&$vars)
    {
        if(!isset($vars["node"]) || !in_array($vars["node"]->type, ["nlarticle"]))
        {
            return;
        }
    
        /** @var \stdClass $node */
        $node = $vars["node"];
    
        $newsletterNumber = 719;
        $newsletterDate = 'November 17, 1633';
        
        $agoraNavBar = [
            '#theme' => 'agoranav_newsletter',
            '#number' => $newsletterNumber,
            '#date' => $newsletterDate,
        ];
    
        $vars['page']['content']['sidebar'] = $agoraNavBar;
        
        
    }
    
    
    /**
     * Navigation bar for single article nodes
     * @param array $vars
     */
    private static function generateArticleNavbar(&$vars)
    {
        if(isset($vars["node"]))
        {
            /** @var \stdClass $node */
            $node = $vars["node"];
            
            if(in_array($node->type, ["standard", "long", "event"]))
            {
                //dpm($node, "PAGE NODE");
                
                $customlink1 = false;
                
                //Event has special google calendar link
                if($node->type == "event")
                {
                    //dpm($node, "N");
                    $customlink1 = "#";
                    if(isset($node->field_event_date[LANGUAGE_NONE][0]['value']) && isset
                        ($node->field_event_date[LANGUAGE_NONE][0]['value2']))
                    {
                        // Title
                        $title = $node->title;
    
                        // Details
                        $details = '';
    
                        // Location
                        $location = "";
                        if(isset($node->field_event_location['und'][0]['value']))
                        {
                            $location = $node->field_event_location['und'][0]['value'];
                        }
    
                        // Dates
                        $timeZone = new \DateTimeZone($node->field_event_date[LANGUAGE_NONE][0]['timezone']);
                        //$startDate = new \DateTime($node->field_event_date[LANGUAGE_NONE][0]['value'], $timeZone);
                        //$finishDate = new \DateTime($node->field_event_date[LANGUAGE_NONE][0]['value2'], $timeZone);
                        $startDate = new \DateTime($node->field_event_date[LANGUAGE_NONE][0]['value']);
                        $startDate->setTimezone($timeZone);
                        $finishDate = new \DateTime($node->field_event_date[LANGUAGE_NONE][0]['value2']);
                        $finishDate->setTimezone($timeZone);
                        $customlink1 = ThemeHelper::createGoogleCalendarInsertUri($title, $details, $location, $startDate, $finishDate);
                    }
                }
    
                $title = $node->title_field[LANGUAGE_NONE][0]['value'];
                
                $parentNid = false;
                $parentTitle = false;
                $parentIssueNumber = false;
                if(isset($node->nodehierarchy_menu_links[0]['pnid']))
                {
                    $parentNid = $node->nodehierarchy_menu_links[0]['pnid'];
                    $parentNode = node_load($parentNid);
                    if($parentNode)
                    {
                        //dpm($parentNode, "PARENT");
                        $parentTitle = $parentNode->title_field[LANGUAGE_NONE][0]['value'];
                        $parentIssueNumber = $parentNode->field_pubnumber[LANGUAGE_NONE][0]['value'];
                    }
                }
    
    
                $agoraNavBar = [
                    '#theme' => 'agoranav_article',
                    '#backlink' => url('<front>', []),
                    '#issue' => 'ISSUE #' . $parentIssueNumber,
                    '#article_title' => $title,
                ];
                
                if($customlink1) {
                    $agoraNavBar['#customlink1'] = $customlink1;
                }
    
                $vars['page']['content']['navbar'] = $agoraNavBar;
            }
        }
    }
    
    /**
     * Add THS based on the area we are in
     *
     * @param array $vars
     */
    private static function setThemeHookSuggestions(&$vars)
    {
        $vars['theme_hook_suggestions'][] = 'page__area__' . ThemeHelper::getCurrentAreaName();
    }
    
}