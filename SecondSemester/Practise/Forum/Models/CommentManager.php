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
}