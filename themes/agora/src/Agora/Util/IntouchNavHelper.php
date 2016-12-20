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
     * @return array
     */
    public static function getRenderableNewsletters($limit, $currentNode)
    {
        $nodes = self::getNewsletterNodes($limit);
        $answer = node_view_multiple($nodes, 'teaser', $limit, LANGUAGE_NONE);
        
        /*
        //check if active/current node
        foreach ($answer["nodes"] as &$el)
        {
            if (is_array($el))
            {
                $el["is_active"] = ['#markup' => ''];
                if (isset($el["#node"]) && is_object($el["#node"]) && isset($el["#node"]->nid))
                {
                    if ($el["#node"]->nid == $currentNode->nid)
                    {
                        $el["is_active"] = ['#markup' => 'active'];
                    }
                }
            }
            
        }
        //dpm($answer["nodes"], "AN");
        */
        
        return $answer;
    }
    
    /**
     * @return array
     */
    public static function getRenderableTopics()
    {
        $answer = [];
        
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