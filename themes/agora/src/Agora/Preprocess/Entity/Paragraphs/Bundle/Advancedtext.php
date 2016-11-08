<?php
/**
 * Created by Adam Jakab.
 * Date: 02/11/16
 * Time: 16.34
 */

namespace Agora\Preprocess\Entity\Paragraphs\Bundle;

use Mekit\Drupal7\HookInterface;
use Stringy\StaticStringy;

class Advancedtext implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setParagraphItemId($vars);
        self::setFocusAsQuote($vars);
        self::addFocusPreview($vars);
        //dpm($vars, "ADVANCED-TEXTT");
    }
    
    /**
     * Puts id of Paragraphs Item on root variable for ease of access
     * @param array $vars
     */
    private static function setParagraphItemId(&$vars)
    {
        if(isset($vars['elements']['#entity']->item_id))
        {
            $vars["paragraphs_entity_item_id"] = $vars['elements']['#entity']->item_id;
        }
    }
    
    /**
     * If focus is to be visualized as Quote then:
     * 1) strip html from quote
     * 2) surround with '<blockquote><p>'
     * @param array $vars
     */
    private static function setFocusAsQuote(&$vars)
    {
        if(isset($vars["content"]["field_focus"][0]["#markup"])
            && isset($vars['field_use_focus_as_quote'][0]['value'])
            && $vars['field_use_focus_as_quote'][0]['value'] == 1)
        {
            $focusStrippedMarkup = strip_tags($vars["content"]["field_focus"][0]["#markup"]);
            $vars["content"]["field_focus"][0]["#markup"] = '<blockquote><p>' . $focusStrippedMarkup .
                '</p></blockquote>';
        }
        
    }
    
    /**
     * @param array $vars
     */
    private static function addFocusPreview(&$vars)
    {
        if(isset($vars["content"]["field_focus"][0]["#markup"]))
        {
            $focusMarkup = $vars["content"]["field_focus"][0]["#markup"];
            $focusPreview = (string) StaticStringy::safeTruncate(strip_tags($focusMarkup), 100, '...');
            $vars["content"]["field_focus_preview"] = [
                '#markup' => $focusPreview,
            ];
        }
    }
}