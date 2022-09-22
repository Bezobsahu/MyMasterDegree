<?php

class UserToCommentReacting
{
    private int $id;
    private int $user_id;
    private int $comment_id;
    private int $reaction_id;
     
    public function __construct (
       int $id,
       int $user_id,
       int $comment_id,
       int $reaction_id,
      
    )
    {
      $this->id=$id;
      $this->user_id=$user_id;
      $this->comment_id=$comment_id;
      $this->reaction_id=$reaction_id;
    
    }
    
	/**
	 * @return int
	 */
	function getId(): int {
		return $this->id;
	}
	
	/**
	 * @return int
	 */
	function getUser_id(): int {
		return $this->user_id;
	}
	
	/**
	 * @return int
	 */
	function getComment_id(): int {
		return $this->comment_id;
	}
	
	/**
	 * @return int
	 */
	function getReacion_id(): int {
		return $this->reaction_id;
	}
}