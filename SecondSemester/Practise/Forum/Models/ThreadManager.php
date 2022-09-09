<?php 

class ThreadManager
{
    public function getById ($id): ?Threados
    {
        
        $tread = Db::queryOne('
            SELECT `id`, `user_id`, `content`, `date`, `name`, `section` 
            FROM `thread`
            WHERE `id` = ?
            ', array($id)

        );

       
            return new Threados(
                $tread['id'],
                $tread['user_id'],
                $tread['content'],
                $tread['date'],
                $tread['name'],
                $tread['section'],
            );

       
    }
   
    public function getThreadByIdWithAuthor($id): ?Threados
    {
        return Db::queryOne('
            SELECT thread.id, thread.name, thread.content, thread.user_id, user.username
            FROM `thread`
            INNER JOIN user ON thread.user_id=user.id
            WHERE thread.id = ?
            
            ', array($id)

        );
    }
   
    public function getAllFromSection ($section_id)
    {
        $threadsQ = Db::queryAll('
            SELECT `id`, `user_id`, `content`, `date`, `name`, `section`
            FROM `thread`
            WHERE `section` = ?
            ', array($section_id)
        );
        if (empty($threadsQ))
        {
            $threadManager = new ThreadManager;
            $threads[] = $threadManager->getById(42);
            
            return $threads;
        }
        else
        {
            foreach($threadsQ as $thread)
            {
                $threads[] = new Threados(
                $thread['id'],
                $thread['user_id'],
                $thread['content'],
                $thread['date'],
                $thread['name'],
                $thread['section'],
                );
            }
            return $threads;
        }
        

        
    }

    public function getAll ()
    {
        return Db::queryAll('
            SELECT `name`, `content`, `user_id`
            FROM `thread`
            ORDER BY `name` DESC'
        );

    }

    public function getAllDateOrder (): ?Array
    {
        
       $threadsQ = Db::queryAll('
            SELECT `id`, `user_id`, `content`, `date`, `name`, `section`
            FROM `thread`
            ORDER BY `date` DESC'
         );
        
        $threads=[];

        foreach($threadsQ as $thread)
        {
            $threads[] = new Threados(
            $thread['id'],
            $thread['user_id'],
            $thread['content'],
            $thread['date'],
            $thread['name'],
            $thread['section'],
            );
        }
        
        return $threads;
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
    public function getEmpty()
    {
        return array(
            null,
            null,
            null,
            null,
            null,
            null,
        );

    }
}