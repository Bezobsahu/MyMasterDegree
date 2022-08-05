<?php 

class ThreadManager
{
    public function getThreadById ($id)
    {
        return Db::queryOne('
            SELECT `name`, `content`, `user_id`
            FROM `thread`
            WHERE `id` = ?
            ', array($id)

        );
    }
   
    public function getThreadByIdWithAuthor($id)
    {
        return Db::queryOne('
            SELECT thread.id, thread.name, thread.content, thread.user_id, user.username
            FROM `thread`
            INNER JOIN user ON thread.user_id=user.id
            WHERE thread.id = ?
            
            ', array($id)

        );
    }
   
    public function getAllFromSelection ($selection_id)
    {
        return Db::queryOne('
            SELECT `name`, `content`, `user_id`
            FROM `thread`
            WHERE `selection` = ?
            ', array($selection_id)
        );

    }

    public function getAll ()
    {
        return Db::queryAll('
            SELECT `name`, `content`, `user_id`
            FROM `thread`
            ORDER BY `name` DESC'
        );

    }

    public function getAllByDate ()
    {
        
       return Db::queryAll('
            SELECT `id`, `name`, `content`, `user_id`
            FROM `thread`
            ORDER BY `date` DESC'
         );
         
    }

    public function getAllByDateWithAuthors ()
    {
        
       return Db::queryAll('
            SELECT thread.id, thread.name, thread.content, thread.user_id, user.username
            FROM `thread`
            INNER JOIN user ON thread.user_id=user.id
            ORDER BY `date` DESC'
         );
         
    }

}