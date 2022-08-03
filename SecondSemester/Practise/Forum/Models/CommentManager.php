<?php 

class CommentManager
{
    public function getAllByThreadWithAuthors($id)
    {
        return Db::queryAll('
            SELECT  comment.content, user.username, comment.user_id
            FROM `comment`
            INNER JOIN user ON comment.user_id=user.id
            WHERE `thread_id` = ?
            ', array($id)

        );
    }
}