<?php

class UserToCommentReactingManager
{
    public function getByUserCommentReaction(int $user_id,int $comment_id,int $reaction_id)
    {
        $reacting = Db::queryOne('
            SELECT `id`, `user_id`, `comment_id`, `reaction_id`
            FROM `UserToCommentReacting`
            WHERE `user_id` = ? and `comment_id`=? and `reaction_id`=?
            ', array($user_id,$comment_id,$reaction_id)

        );
        
        if($reacting===false)
        {
            return null;
        }
        else
        {
        return new UserToCommentReacting(
            $reacting['id'],
            $reacting['user_id'],
            $reacting['comment_id'],
            $reacting['reaction_id']
        );
        }
    }


    public function getByUserComment(int $user_id,int $comment_id)
    {
        $reacting = Db::queryOne('
            SELECT `id`, `user_id`, `comment_id`, `reaction_id`
            FROM `UserToCommentReacting`
            WHERE `user_id` = ? and `comment_id`=? 
            ', array($user_id,$comment_id)

        );
       
        if($reacting===false)
        {
            return null;
        }
        else
        {
        return new UserToCommentReacting(
            $reacting['id'],
            $reacting['user_id'],
            $reacting['comment_id'],
            $reacting['reaction_id']
        );
        }
    }

    public function getAllByCommentAndReaction(int $comment_id, int $reaction_id)
    {
        $reactingsQ = Db::queryAll('
            SELECT `id`, `user_id`, `comment_id`, `reaction_id`
            FROM `UserToCommentReacting`
            WHERE `comment_id`=? and `reaction_id`= ?
            ', array($comment_id,$reaction_id)

        );

        $reactings=[];

        if($reactingsQ===false)
        {
            return null;
        }
        else
        {
            

            foreach($reactingsQ as $reacting)
                {
                    $reactings[] = new UserToCommentReacting(
                    $reacting['id'],
                    $reacting['user_id'],
                    $reacting['comment_id'],
                    $reacting['reaction_id']);
                }
            return $reactings;
    
        }
    }

    public function add(int $user_id, int $comment_id, int $reaction_id)
    {
        $usertocommentreacting=array("user_id"=>$user_id,
                        "comment_id"=>$comment_id,
                        "reaction_id"=>$reaction_id);

        Db::queryOne('
            INSERT INTO usertocommentreacting(`user_id`, `comment_id`, `reaction_id`)
            VALUES          (:user_id, :comment_id, :reaction_id)
        ',$usertocommentreacting); 
    }

    
    
    public function delete(int $user_id,int $comment_id)
    {
        Db::queryOne('
            DELETE FROM `UserToCommentReacting`
            WHERE `user_id` = ? and `comment_id`= ?
            ', array($user_id,$comment_id));
    }

    
}