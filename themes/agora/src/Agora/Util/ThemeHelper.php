<?php
/**
 * Created by Adam Jakab.
 * Date: 27/07/15
 * Time: 11.02
 */

namespace Agora\Util;

/**
 * Class ThemeHelper
 *
 * @package Agora\Util
 */
class ThemeHelper
{
    
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
     * @param string $title
     * @param string $details
     * @param string $location
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
     * @param string$view_display
     *
     * @return bool|string|void
     */
    public static function getView($view_name, $view_display)
    {
        $answer = '';
        $viewResults = views_get_view_result($view_name, $view_display);
        if (count($viewResults)){
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