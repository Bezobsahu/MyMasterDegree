<?php

class ReactionManager
{
    public function getAll()
    {
        $reactionsQ = Db::queryAll('
            SELECT `id`, `name`, `emoji`
            FROM `reaction`
            ORDER BY `id` DESC
            '
         );
        
        $reactions=[];

        foreach($reactionsQ as $reaction)
        {
            $reactions[] = new Reaction(
            $reaction['id'],
            $reaction['name'],
            $reaction['emoji'],
            );
        }
        return $reactions;
    }
}