<?php
/**
 * Created by Adam Jakab.
 * Date: 20/10/16
 * Time: 9.50
 */

namespace Agora\Preprocess;

use Agora\Util\ThemeHelper;
use Mekit\Drupal7\HookInterface;
use Stringy\StaticStringy;

class Html implements HookInterface
{
    /**
     * @param array $vars
     */
    public static function execute(&$vars)
    {
        self::addArticleCategoryBodyClasses($vars);
        self::addIntouchBodyClasses($vars);
        
        //dpm($vars, "HTML");
    }
    
    
    /**
     * @param array $vars
     */
    private static function addIntouchBodyClasses(&$vars)
    {
        if(ThemeHelper::getCurrentArea() == ThemeHelper::AREA_INTOUCH)
        {
            $customClasses = ['intouch'];
            $node = self::getNodeFromHtmlVars($vars);
            if($node && isset($node->type) && $node->type == 'nlarticle')
            {
                $customClasses[] = 'compressed--header';
            }
            
            $vars['classes_array'] = array_merge($vars['classes_array'], $customClasses);
        }
    }
    
    
    /**
     * @param array $vars
     */
    private static function addArticleCategoryBodyClasses(&$vars) {
        $customClasses = [];
        $node = self::getNodeFromHtmlVars($vars);
        if($node)
        {
            //Article Category Name
            $catName = ThemeHelper::getArticleCategoryNameFromNode($node);
            if($catName)
            {
                $customClasses[] = 'article-category-' . $catName;
            }
        }
        if(count($customClasses))
        {
            $vars['classes_array'] = array_merge($vars['classes_array'], $customClasses);
        }
    }
    
    /**
     * @param array $vars
     *
     * @return bool|\stdClass
     */
    private static function getNodeFromHtmlVars(&$vars)
    {
        $node = false;
        if(isset($vars['page']['content']['system_main']['nodes']))
        {
            $nodes = $vars['page']['content']['system_main']['nodes'];
            
            /**
             * @var string $nid
             * @var array $n
             */
            foreach($nodes as $nid => $n)
            {
                if(isset($n['#entity_type']) && isset($n['#bundle']))
                {
                    if($n['#entity_type'] == 'node')
                    {
                        if(isset($n['#node']))
                        {
                            /** @var \stdClass $node */
                            $node = $n['#node'];
                            break;
                        }
                    }
                }
            }
        }
        return $node;
    }
}
