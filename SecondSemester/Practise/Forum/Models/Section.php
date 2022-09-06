<?php

class Section
{
    private int $id;
    private $selection_id;
    private int $user_id;
    private string $name;
    private string $description;
     
    public function __construct (
       int $id,
       $selection_id,
       int $user_id,
       string $name,
       string $description,
    )
    {
      $this->id=$id;
      $this->selection_id=$selection_id;
      $this->user_id=$user_id;
      $this->name=$name;
      $this->description=$description;
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
	function getSelection_id(): int {
		return $this->selection_id;
	}
	
	/**
	 * @return int
	 */
	function getUser_id(): int {
		return $this->user_id;
	}
	
	/**
	 * @return string
	 */
	function getName(): string {
		return $this->name;
	}
	
	/**
	 * @return string
	 */
	function getDescription(): string {
		return $this->description;
	}
}