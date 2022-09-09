<?php

class Threados
{
    private int $id;
    private int $user_id;
    private string $content;
    private string $date;
    private string $name;
    private int $section;

    public function __construct (
       int $id,
       int $user_id,
       string $content,
       string $date,
       string $name,
       int $section,
    )
    {
      $this->id=$id;
      $this->user_id=$user_id;
      $this->content=$content;
      $this->date=$date;
      $this->name=$name;
      $this->section=$section;
    }
    
	/**
	 * @return int
	 */
	function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return Thread
	 */
	function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return int
	 */
	function getUser_id(): int {
		return $this->user_id;
	}
	
	/**
	 * @param int $user_id 
	 * @return Thread
	 */
	function setUser_id(int $user_id): self {
		$this->user_id = $user_id;
		return $this;
	}
	
	/**
	 * @return string
	 */
	function getContent(): string {
		return $this->content;
	}
	
	/**
	 * @param string $content 
	 * @return Thread
	 */
	function setContent(string $content): self {
		$this->content = $content;
		return $this;
	}
	
	/**
	 * @return string
	 */
	function getDate(): string {
		return $this->date;
	}
	
	/**
	 * @param string $date 
	 * @return Thread
	 */
	function setDate(string $date): self {
		$this->date = $date;
		return $this;
	}
	
	/**
	 * @return string
	 */
	function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 * @return Thread
	 */
	function setName(string $name): self {
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @return int
	 */
	function getSection(): int {
		return $this->section;
	}
	
	/**
	 * @param int $section 
	 * @return Thread
	 */
	function setSelection(int $section): self {
		$this->section = $section;
		return $this;
	}

	function getAuthorUsername(): string {
		$userManager = new UserManager;
		$user = $userManager->getUserWithId($this->user_id);
		return $user->getUsername();
	}
}