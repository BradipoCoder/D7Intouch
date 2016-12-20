<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Preprocess;

use Agora\Util\IntouchNavHelper;
use Agora\Util\NodeHelper;
use Agora\Util\ThemeHelper;
use Mekit\Drupal7\HookInterface;
use Stringy\StaticStringy;

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
            }
        }
        
        if(ThemeHelper::getCurrentArea() == ThemeHelper::AREA_INTOUCH)
        {
            self::generateNewsletterArticleNavbar($vars);
            $hasNavigation = true;
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
        $agoraNavBar = [];
        
        if($vars["node"]->type == 'newsletter')
        {
            /** @var \stdClass $newsletterNode */
            $newsletterNode = $vars["node"];
        } else {
            /** @var \stdClass $newsletterNode */
            $newsletterNode = NodeHelper::getParentNodeOfNodeInVars($vars);
        }
        
        
        if($newsletterNode)
        {
            //dpm($newsletterNode, "NLN");
            $newsletterTitle = field_view_field('node', $newsletterNode, 'title_field', 'full');
            $newsletterDate = field_view_field('node', $newsletterNode, 'field_pubdate', 'full');
            $backLink = url('node/' . $newsletterNode->nid);
            
            $img = $newsletterNode->field_image[LANGUAGE_NONE][0];
            $bgImage = image_style_url('newsletter_cover_vertical', $img["uri"]);
            
            $elementsNewlettersLast = IntouchNavHelper::getRenderableNewsletters(6);
            $elementsNewlettersAll = IntouchNavHelper::getRenderableNewsletters(0);
            $elementsTopics = IntouchNavHelper::getRenderableTopics();
            
            $agoraNavBar = [
                '#theme' => 'agoranav_newsletter',
                '#title' => $newsletterTitle,
                '#date' => $newsletterDate,
                '#bgimage' => $bgImage,
                '#backlink' => $backLink,
                '#elements_nl_last' => $elementsNewlettersLast,
                '#elements_nl_all' => $elementsNewlettersAll,
                '#elements_topics' => $elementsTopics,
            ];
        } else {
            $tid = false;
            $topicTitle = '';
            $topicId = '';
            $topicClass = '';
            $bgImage = '';
            if(arg(0) == "newsletter" && arg(1) == "topic")
            {
                $tid = arg(2);
                $term = taxonomy_term_load($tid);
                $topicTitle = $term->name_field[LANGUAGE_NONE][0]["value"];
                $topicId = $tid;
                $topicClass = 'topic_' . StaticStringy::underscored(transliteration_clean_filename($topicTitle));
            }
            
            $agoraNavBar = [
                '#theme' => 'agoranav_newstopic',
                '#title' => $topicTitle,
                '#topic_class' => $topicClass,
                '#topic_id' => $topicId,
                '#bgimage' => $bgImage,
            ];
        }
        
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