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
        self::setupContent($vars);
        //dpm($vars, "IMAGE-GALLERY");
    }
    
    /**
     * @param array $vars
     */
    private static function setupContent(&$vars)
    {
        $content = &$vars["content"];
        
        $images = self::getGalleryImages($vars);
        
        $content["image_gallery"] = [
            '#prefix' => '<ul class="lightslider">',
            '#suffix' => '</ul>',
            'images'  => $images,
        ];
    }
    
    /**
     * @param array $vars
     *
     * @return array
     */
    private static function getGalleryImages(&$vars)
    {
        $answer = [];
        if (isset($vars['elements']['#entity']->field_images['und'])
            && is_array($vars['elements']['#entity']->field_images['und'])
            && count($vars['elements']['#entity']->field_images['und'])
        )
        {
            $imageElements = $vars['elements']['#entity']->field_images['und'];
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
}