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
        
        $galleryStyle = '';
        if (isset($vars['elements']['#entity']->field_gallery_type[LANGUAGE_NONE][0]["value"]))
        {
            $galleryStyle = $vars['elements']['#entity']->field_gallery_type[LANGUAGE_NONE][0]["value"];
        }
        
        switch($galleryStyle)
        {
            case "single":
                $imageElement = $vars['elements']['#entity']->field_images[LANGUAGE_NONE][0];
                $caption = isset($imageElement["title"]) ? $imageElement["title"] : '';
                $content["image_gallery"] = [
                    'image' => [
                        '#theme' => 'image_formatter',
                        '#image_style' => 'gallery_small',
                        '#item' => $imageElement,
                    ],
                    'caption' => [
                        '#markup' => $caption,
                    ],
                ];
                break;
            case "double":
                $content["image_gallery"] = [
                    
                ];
                break;
            case "triple":
                $content["image_gallery"] = [

                ];
                break;
            case "multiple_1":
                $images = self::getGalleryImages($vars);
                $content["image_gallery"] = [
                    '#prefix' => '<ul class="lightslider">',
                    '#suffix' => '</ul>',
                    'images'  => $images,
                ];
                break;
            case "multiple_2":
                $content["image_gallery"] = [
    
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
    private static function getGalleryImages(&$vars)
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
                $img_big_uri = image_style_url('gallery_big', $img_orig_uri);
                //$img_small_uri = image_style_url('gallery_small', $img_orig_uri);
                
                $caption = isset($imageElement["title"]) ? $imageElement["title"] : '';
                
                $liAttributes = [
                    'data-src' => $img_big_uri,
                ];
                
                $image = [
                    '#prefix' => '<li'.drupal_attributes($liAttributes).'>',
                    '#suffix' => '</li>',
                    'image' => [
                        '#theme' => 'image_formatter',
                        '#image_style' => 'gallery_small',
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