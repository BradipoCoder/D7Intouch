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
     * @param string $viewMode
     * @return array
     */
    public static function getRenderableNewsletters($limit, $viewMode = 'teaser')
    {
        $nodes = self::getNewsletterNodes($limit);
        $answer = node_view_multiple($nodes, $viewMode, 0, LANGUAGE_NONE);
        
        return $answer;
    }
    
    /**
     * @param int $limit
     * @param int $topicId
     * @param string $viewMode
     * @return array
     */
    public static function getRenderableNewsletterArticles($limit, $topicId, $viewMode = 'teaser')
    {
        $nodes = self::getNewsletterArticleNodes($limit, $topicId);
        $answer = node_view_multiple($nodes, $viewMode, 0, LANGUAGE_NONE);
        
        return $answer;
    }
    
    /**
     * @param string $viewMode
     * @return array
     */
    public static function getRenderableTopics($viewMode = 'teaser')
    {
        $vocab = taxonomy_vocabulary_machine_name_load('news_category');
        $terms = entity_load('taxonomy_term', FALSE, ['vid' => $vocab->vid]);
        $answer = taxonomy_term_view_multiple($terms, $viewMode, 0, LANGUAGE_NONE);
        
        return $answer;
    }
    
    /**
     * @param int $limit
     * @param int $topicId
     *
     * @return array
     */
    protected static function getNewsletterArticleNodes($limit, $topicId)
    {
        $answer = [];
        
        $nids = taxonomy_select_nodes($topicId, false, $limit, []);
        if ($nids && count($nids))
        {
            $answer = node_load_multiple($nids);
        }
        
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
        
        $q = db_select('node', 'n');
        $q->fields('n', ['nid']);
        $q->addExpression('CAST(title AS UNSIGNED)', 'nlnumber');
        $q->condition('type', 'newsletter', '=');
        $q->orderBy('nlnumber', 'desc');
        
        if ($limit > 0)
        {
            $q->range(0, $limit);
        }
        
        /** @var \DatabaseStatementInterface $statement */
        $statement = $q->execute();
        //echo '<pre>' . $statement->getQueryString() . '</pre>';
        
        $nids = $statement->fetchCol(0);
        
        if ($nids && count($nids))
        {
            $answer = node_load_multiple($nids);
        }
        
        return $answer;
    }
}