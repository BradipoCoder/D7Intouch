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
        
        //krumo($vars, "PAGE VARS");
    }
    
    /**
     * @param array $vars
     */
    private static function generateContentSpecificNavbar(&$vars)
    {
        //exclude some specific paths
        if(arg(0) == 'user') {
            return;
        }
        
        if(arg(0) == 'nlp') {
            return;
        }
        
        if(arg(0) == 'mc-nl-send-test') {
            return;
        }
        
        if(arg(0) == 'mc-nl-send-campaign') {
            return;
        }
        
        if (ThemeHelper::getCurrentArea() == ThemeHelper::AREA_INTOUCH)
        {
            self::generateNewsletterArticleNavbar($vars);
        }
    }
    
    
    /**
     * Header side-bar for: newsletter / newsletter article / topic
     *
     * @param array $vars
     */
    private static function generateNewsletterArticleNavbar(&$vars)
    {
        $newsletterNode = false;
        if ($vars["node"]->type == 'newsletter')
        {
            /** @var \stdClass $newsletterNode */
            $newsletterNode = $vars["node"];
        }
        else if ($vars["node"]->type == 'nlarticle')
        {
            /** @var \stdClass $newsletterNode */
            $newsletterNode = NodeHelper::getParentNodeOfNodeInVars($vars);
        }
        
        if ($newsletterNode)
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
                '#theme'            => 'agoranav_newsletter',
                '#title'            => $newsletterTitle,
                '#date'             => $newsletterDate,
                '#bgimage'          => $bgImage,
                '#backlink'         => $backLink,
                '#elements_nl_last' => $elementsNewlettersLast,
                '#elements_nl_all'  => $elementsNewlettersAll,
                '#elements_topics'  => $elementsTopics,
            ];
        }
        else
        {
            //
            $topicTitle = '';
            $topicId = '';
            $topicClass = '';
            $bgImage = '';
            //
            $elementsNewlettersLast = IntouchNavHelper::getRenderableNewsletters(6);
            $elementsNewlettersAll = IntouchNavHelper::getRenderableNewsletters(0);
            $elementsTopics = IntouchNavHelper::getRenderableTopics();
            if (arg(0) == "newsletter" && arg(1) == "topic")
            {
                $tid = arg(2);
                $term = taxonomy_term_load($tid);
                $topicTitle = $term->name_field[LANGUAGE_NONE][0]["value"];
                $topicId = $tid;
                $topicClass = 'topic_' . StaticStringy::underscored(transliteration_clean_filename($topicTitle));
            }
            
            $agoraNavBar = [
                '#theme'            => 'agoranav_newstopic',
                '#title'            => $topicTitle,
                '#topic_id'         => $topicId,
                '#topic_class'      => $topicClass,
                '#bgimage'          => $bgImage,
                '#elements_nl_last' => $elementsNewlettersLast,
                '#elements_nl_all'  => $elementsNewlettersAll,
                '#elements_topics'  => $elementsTopics,
            ];
        }
        
        $vars['page']['content']['sidebar'] = $agoraNavBar;
    }
    
    
    /**
     * Add THS based on the area we are in
     *
     * @param array $vars
     */
    private static function setThemeHookSuggestions(&$vars)
    {
        //$vars['theme_hook_suggestions'][] = 'page__area__' . ThemeHelper::getCurrentAreaName();
    }
    
}