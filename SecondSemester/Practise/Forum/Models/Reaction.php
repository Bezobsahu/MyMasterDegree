<?php

class Reaction
{
    private int $id;
    private string $name;
    private string $emoji;
     
    public function __construct (
       int $id,
       string $name,
       string $emoji,
      
    )
    {
      $this->id=$id;
      $this->name=$name;
      $this->emoji=$emoji;
    
    }
    
	/**
	 * @return int
	 */
	function getId(): int {
		return $this->id;
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
	function getEmoji(): string {
		return $this->emoji;
	}
}