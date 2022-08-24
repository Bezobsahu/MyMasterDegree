<?php

class Comment
{
    private int $id;
    private int $user_id;
    private int $thread_id;
    private string $content;
    private string $date;
    private bool $modifed;
     
    public function __construct (
       int $id,
       int $user_id,
       int $thread_id,
       string $content,
       string $date,
       bool $modifed,
    )
    {
      $this->id=$id;
      $this->user_id=$user_id;
      $this->thread_id=$thread_id;
      $this->content=$content;
      $this->date=$date;
      $this->modifed=$modifed;
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
	function getThread_id(): int {
		return $this->thread_id;
	}
	
	/**
	 * @return string
	 */
	function getContent(): string {
		return $this->content;
	}
	
	/**
	 * @return string
	 */
	function getDate(): string {
		return $this->date;
	}
	
	/**
	 * @return bool
	 */
	function getModifed(): bool {
		return $this->modifed;
	}

	function getAuthorUsername(): string {
		$userManager = new UserManager;
		$user = $userManager->getUserWithId($this->user_id);
		return $user->getUsername();
	}
}

