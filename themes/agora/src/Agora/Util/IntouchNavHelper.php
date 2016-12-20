<?php
/**
 * Created by Adam Jakab.
 * Date: 20/12/16
 * Time: 11.29
 */

namespace Agora\Util;

class IntouchNavHelper
{
    
    /**
     * @param int $limit
     * @return array
     */
    public static function getRenderableNewsletters($limit)
    {
        $nodes = self::getNewsletterNodes($limit);
        $answer = node_view_multiple($nodes, 'teaser', 0, LANGUAGE_NONE);
        
        return $answer;
    }
    
    /**
     * @return array
     */
    public static function getRenderableTopics()
    {
        $vocab = taxonomy_vocabulary_machine_name_load('news_category');
        $terms = entity_load('taxonomy_term', FALSE, ['vid' => $vocab->vid]);
        $answer = taxonomy_term_view_multiple($terms, 'teaser', 0, LANGUAGE_NONE);
        
        return $answer;
    }
    
    /**
     * @param int $limit
     *
     * @return array
     */
    protected static function getNewsletterNodes($limit = 10)
    {
        $answer = [];
        
        $select = db_select('node', 'n')
            ->fields('n', ['nid'])
            ->condition('type', 'newsletter', '=')
            ->orderBy('title', 'desc');
        
        if ($limit > 0)
        {
            $select->range(0, $limit);
        }
        
        /** @var \DatabaseStatementInterface $statement */
        $statement = $select->execute();
        
        $nids = $statement->fetchCol();
        
        if ($nids && count($nids))
        {
            $answer = node_load_multiple($nids);
        }
        
        return $answer;
    }
}