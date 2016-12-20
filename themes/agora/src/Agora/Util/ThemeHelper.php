<?php
/**
 * Created by Adam Jakab.
 * Date: 27/07/15
 * Time: 11.02
 */

namespace Agora\Util;

use Stringy\StaticStringy;

/**
 * Class ThemeHelper
 *
 * @package Agora\Util
 */
class ThemeHelper
{
    const AREA_AGORA = 1;
    const AREA_INTOUCH = 2;
    
    /**
     * @var array
     */
    protected static $intouchNodeTypes = ['newsletter', 'nlarticle'];
    
    /**
     * Decide and return what area we are currently in
     * Reason: AREA_AGORA and AREA_INTOUCH are using completely different style.less so we must compile css
     * and add to output dynamically. (maybe other reasons too)
     * Decision: Always AREA_AGORA unless:
     *      content type: newsletter|nlarticle
     *      url/nid: boh? - tipo pagina newsletter topic??
     * @return int
     */
    public static function getCurrentArea()
    {
        $answer = self::AREA_AGORA;
    
        $menuItem = menu_get_object();
        $nodeType = isset($menuItem->type) ? $menuItem->type : false;
        //$nodeId = isset($menuItem->nid) ? $menuItem->nid : false;
        if(in_array($nodeType, self::$intouchNodeTypes))
        {
            $answer = self::AREA_INTOUCH;
        }
        
        return $answer;
    }
    
    /**
     * @return string
     */
    public static function getCurrentAreaName()
    {
        return self::getCurrentArea() == self::AREA_AGORA ? 'agora' : 'intouch';
    }
    
    /**
     * Get the children of the given node.
     *
     * @param string $pnid
     * @param int $limit
     *
     * @return array
     *
     */
    public static function NHGetChildrenNids($pnid, $limit = 0)
    {
        $nids = [];
        
        $query = db_select('node', 'n');
        $query->join('nodehierarchy_menu_links', 'nhml', 'n.nid = nhml.nid');
        $query->join('menu_links', 'ml', 'nhml.mlid = ml.mlid');
        $query->join('nodehierarchy_menu_links', 'nhp', 'ml.plid = nhp.mlid');
        $query->fields('n', ['nid']);
        $query->condition('nhp.nid', $pnid, '=');
        
        $result = $query->execute();
        foreach ($result as $item) {
            $nids[] = $item->nid;
        }
        
        return $nids;
    }
    
    /**
     * Get name of the taxonomy term for a field in the node and return it (underscored if you want)
     * @param \stdClass $node
     * @param string $fieldName
     * @param bool $underscored
     * @return string
     */
    public static function getArticleCategoryNameFromNode($node, $fieldName, $underscored = true)
    {
        $answer = '';
        
        if(isset($node->{$fieldName})) {
            $field = $node->{$fieldName};
            
            $taxonomyTerm = false;
            if(isset($field[LANGUAGE_NONE][0]['taxonomy_term']))
            {
                $taxonomyTerm = $field[LANGUAGE_NONE][0]['taxonomy_term'];
            } else if(isset($field[0]['taxonomy_term']))
            {
                $taxonomyTerm = $field[0]['taxonomy_term'];
            }
            
            if($taxonomyTerm)
            {
                if(isset($taxonomyTerm->name) && !empty($taxonomyTerm->name))
                {
                    $answer = $taxonomyTerm->name;
                    if($underscored)
                    {
                        $answer = transliteration_clean_filename($answer);
                        $answer = StaticStringy::underscored($answer);
                    }
                }
            }
        }

        return $answer;
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
     * @param string    $title
     * @param string    $details
     * @param string    $location
     * @param \DateTime $startDate
     * @param \DateTime $finishDate
     *
     * @return string
     */
    public static function createGoogleCalendarInsertUri($title, $details, $location, $startDate, $finishDate)
    {
        $path = 'https://www.google.com/calendar/render';
        
        // Location (normally location will come from textarea with addess on multiple lines)
        $location = str_replace("\n", " ", $location);
        
        //Dates - Format: dates=YYYYMMDDToHHMMSSZ/YYYYMMDDToHHMMSSZ
        $timeZoneUTC = new \DateTimeZone('UTC');
        $startDateUTC = clone $startDate;
        $startDateUTC->setTimezone($timeZoneUTC);
        $finishDateUTC = clone $finishDate;
        $finishDateUTC->setTimezone($timeZoneUTC);
        $startDateStr = $startDateUTC->format("Ymd") . 'T' . $startDateUTC->format("His") . 'Z';
        $finishDateStr = $finishDateUTC->format("Ymd") . 'T' . $finishDateUTC->format("His") . 'Z';
        $dates = $startDateStr . '/' . $finishDateStr;
        
        $options = [
            'absolute' => true,
            'external' => true,
            'query'    => [
                'action'   => 'TEMPLATE',
                'text'     => $title,
                'details'  => $details,
                'location' => $location,
                'dates'    => $dates,
                'trp'      => 'false',
                'sf'       => 'true',
                'output'   => 'xml',
            ],
        ];
        
        $answer = check_plain(url($path, $options));
        
        return $answer;
    }
    
    /**
     * @return string
     */
    public static function getCurrentThemePath()
    {
        return drupal_get_path('theme', $GLOBALS['theme']);
    }
    
    /**
     * Gets a view by name and display
     *
     * @param string $view_name
     * @param string $view_display
     *
     * @return bool|string|void
     */
    public static function getView($view_name, $view_display)
    {
        $answer = '';
        $viewResults = views_get_view_result($view_name, $view_display);
        if (count($viewResults))
        {
            $answer = views_embed_view($view_name, $view_display);
        }
        
        return $answer;
    }
    
    /**
     * @return string
     */
    protected static function getCurrentLanguageCode()
    {
        global $language;
        
        return $language->language;
    }
}