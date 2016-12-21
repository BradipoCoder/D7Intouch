<?php
/**
 * Created by Adam Jakab.
 * Date: 02/11/16
 * Time: 16.34
 */

namespace Agora\Preprocess\Entity\Paragraphs\Bundle;

use Mekit\Drupal7\HookInterface;

class Imagegallery implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::setThemeHookSuggestions($vars);
        self::setupContent($vars);
        
        //dpm($vars, "IMAGE-GALLERY");
    }
    
    /**
     * @param array $vars
     */
    private static function setupContent(&$vars)
    {
        $content = &$vars["content"];
        $content["image_gallery"] = [];
        
        $galleryStyle = '';
        if (isset($vars['elements']['#entity']->field_gallery_type[LANGUAGE_NONE][0]["value"]))
        {
            $galleryStyle = $vars['elements']['#entity']->field_gallery_type[LANGUAGE_NONE][0]["value"];
        }
    
        $imageElements = $vars['elements']['#entity']->field_images[LANGUAGE_NONE];
        
        switch($galleryStyle)
        {
            case "single":
                $imageElement = $imageElements[0];
                $caption = isset($imageElement["title"]) ? $imageElement["title"] : '';
                $content["image_gallery"] = [
                    'image' => [
                        '#theme' => 'image_formatter',
                        '#image_style' => '16_9_h310',
                        '#item' => $imageElement,
                    ],
                    'caption' => [
                        '#markup' => $caption,
                    ],
                ];
                break;
            case "double":
                $content["image_gallery"][] = [
                    '#theme' => 'image_formatter',
                    '#image_style' => 'gallery_vertical',
                    '#item' => $imageElements[0],
                ];
                $content["image_gallery"][] = [
                    '#theme' => 'image_formatter',
                    '#image_style' => 'gallery_vertical',
                    '#item' => $imageElements[1],
                ];
                break;
            case "triple":
                $content["image_gallery"][] = [
                    '#theme' => 'image_formatter',
                    '#image_style' => 'gallery_vertical',
                    '#item' => $imageElements[0],
                ];
                $content["image_gallery"][] = [
                    '#theme' => 'image_formatter',
                    '#image_style' => '16_9_h310',
                    '#item' => $imageElements[1],
                ];
                $content["image_gallery"][] = [
                    '#theme' => 'image_formatter',
                    '#image_style' => '16_9_h310',
                    '#item' => $imageElements[2],
                ];
                break;
            case "multiple_1":/* this is the style defined in newsletter */
                $content["image_gallery"] = self::getGalleryImages_Style1($vars);
                break;
            case "multiple_2":/* this is the style defined in articles */
                $content["image_gallery"] = [
                    '#prefix' => '<ul class="lightslider">',
                    '#suffix' => '</ul>',
                    'images'  => self::getGalleryImages_Style2($vars),
                ];
                break;
            default:
                break;
        }
    }
    
    /**
     * @param array $vars
     *
     * @return array
     */
    private static function getGalleryImages_Style1(&$vars)
    {
        $answer = [];
        if (isset($vars['elements']['#entity']->field_images[LANGUAGE_NONE])
            && is_array($vars['elements']['#entity']->field_images[LANGUAGE_NONE])
            && count($vars['elements']['#entity']->field_images[LANGUAGE_NONE])
        )
        {
            $imageElements = $vars['elements']['#entity']->field_images[LANGUAGE_NONE];
            foreach($imageElements as $imageElement)
            {
                $img_orig_uri = $imageElement["uri"];
                $img_small_uri = image_style_url('16_9_h65', $img_orig_uri);
                
                $liAttributes = [
                    'data-thumb' => $img_small_uri,
                ];
                
                $image = [
                    '#prefix' => '<li'.drupal_attributes($liAttributes).'>',
                    '#suffix' => '</li>',
                    'image' => [
                        '#theme' => 'image_formatter',
                        '#image_style' => '16_9_h310',
                        '#item' => $imageElement,
                    ],
                ];
                
                array_push($answer, $image);
            }
        }
        return $answer;
    }
    
    /**
     * @param array $vars
     *
     * @return array
     */
    private static function getGalleryImages_Style2(&$vars)
    {
        $answer = [];
        if (isset($vars['elements']['#entity']->field_images[LANGUAGE_NONE])
            && is_array($vars['elements']['#entity']->field_images[LANGUAGE_NONE])
            && count($vars['elements']['#entity']->field_images[LANGUAGE_NONE])
        )
        {
            $imageElements = $vars['elements']['#entity']->field_images[LANGUAGE_NONE];
            foreach($imageElements as $imageElement)
            {
                $img_orig_uri = $imageElement["uri"];
                $img_big_uri = image_style_url('16_9_h1206', $img_orig_uri);
                
                $caption = isset($imageElement["title"]) ? $imageElement["title"] : '';
                
                $liAttributes = [
                    'data-src' => $img_big_uri,
                ];
                
                $image = [
                    '#prefix' => '<li'.drupal_attributes($liAttributes).'>',
                    '#suffix' => '</li>',
                    'image' => [
                        '#theme' => 'image_formatter',
                        '#image_style' => '16_9_h756',
                        '#item' => $imageElement,
                    ],
                    'caption' => [
                        '#prefix' => '<span class="caption">',
                        '#suffix' => '</span>',
                        '#markup' => $caption,
                    ],
                ];
                
                array_push($answer, $image);
            }
        }
        return $answer;
    }
    
    /**
     * Add THS based on the area we are in
     *
     * @param array $vars
     */
    private static function setThemeHookSuggestions(&$vars)
    {
    
        if (isset($vars['elements']['#entity']->field_gallery_type[LANGUAGE_NONE][0]["value"]))
        {
            $galleryStyle = $vars['elements']['#entity']->field_gallery_type[LANGUAGE_NONE][0]["value"];
    
            $originalSuggestions = $vars['theme_hook_suggestions'];
            $newSuggestions = [
                'paragraphs_item',
                'paragraphs_item__imagegallery',
                'paragraphs_item__imagegallery__style_' . $galleryStyle,
            ];
    
            $vars['theme_hook_suggestions'] = array_unique(array_merge($newSuggestions, $originalSuggestions));
        }
    }
}