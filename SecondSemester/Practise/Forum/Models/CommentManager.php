<?php 

class commentManager
{
    public function getAllByThreadWithAuthors($id)
    {
        return Db::queryAll('
            SELECT  comment.content, user.username
            FROM `comment`
            INNER JOIN user ON comment.user_id=user.id
            WHERE `id` = ?
            ', array($id)

        );
    }
}