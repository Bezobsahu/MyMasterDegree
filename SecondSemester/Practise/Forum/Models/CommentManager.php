<?php 

class CommentManager
{
    public function getAllByThreadWithAuthors($id)
    {
        return Db::queryAll('
            SELECT  comment.content, user.username, comment.user_id, comment.date
            FROM `comment`
            INNER JOIN user ON comment.user_id=user.id
            WHERE `thread_id` = ?
            ORDER BY `date` DESC
            ', array($id)

        );
    }

    public function getAllByThread($id)
    {
        $commentsQ = Db::queryAll('
            SELECT `id`, `user_id`, `thread_id`, `content`, `date`, `modifed`
            FROM `comment`
            WHERE `thread_id` = ?
            ORDER BY `date` DESC
            ', array($id)

        );
        
        $comments=[];

        foreach ($commentsQ as $comment)
        {
            $comments[]= new Comment(
                $comment['id'],
                $comment['user_id'],
                $comment['thread_id'],
                $comment['content'],
                $comment['date'],
                $comment['modifed']
            );
        }
       
        return $comments;
    }
}