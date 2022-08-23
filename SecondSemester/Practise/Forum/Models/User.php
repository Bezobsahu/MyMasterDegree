<?php

class User 
{
    private int $id;
    private string $role_id;
    private string $username;
    private string $name;
    private string $surname;
    private string $email;
    private string $password;
    private string $birthdate;

    public function __construct (
       int $id,
       string $role_id,
       string $username,
       string $name,
       string $surname,
       string $email,
       string $password,
       string $birthdate,
    )
    
    {
      $this->id=$id;
      $this->role_id=$role_id;
      $this->username=$username;
      $this->name=$name;
      $this->surname=$surname;
      $this->email=$email;
      $this->password=$password;
      $this->birthdate=$birthdate;
    }
    
	/**
	 * @return int
	 */
	function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return User
	 */
	function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return string
	 */
	function getRole_id(): string {
		return $this->role_id;
	}
	
	/**
	 * @param string $role_id 
	 * @return User
	 */
	function setRole_id(string $role_id): self {
		$this->role_id = $role_id;
		return $this;
	}
	
	/**
	 * @return string
	 */
	function getUsername(): string {
		return $this->username;
	}
	
	/**
	 * @param string $username 
	 * @return User
	 */
	function setUsername(string $username): self {
		$this->username = $username;
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
	 * @return User
	 */
	function setName(string $name): self {
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @return string
	 */
	function getSurname(): string {
		return $this->surname;
	}
	
	/**
	 * @param string $surname 
	 * @return User
	 */
	function setSurname(string $surname): self {
		$this->surname = $surname;
		return $this;
	}
	
	/**
	 * @return string
	 */
	function getEmail(): string {
		return $this->email;
	}
	
	/**
	 * @param string $email 
	 * @return User
	 */
	function setEmail(string $email): self {
		$this->email = $email;
		return $this;
	}
	
	/**
	 * @return string
	 */
	function getPassword(): string {
		return $this->password;
	}
	
	/**
	 * @param string $password 
	 * @return User
	 */
	function setPassword(string $password): self {
		$this->password = $password;
		return $this;
	}
	
	/**
	 * @return string
	 */
	function getBirthdate(): string {
		return $this->birthdate;
	}
	
	/**
	 * @param string $birthdate 
	 * @return User
	 */
	function setBirthdate(string $birthdate): self {
		$this->birthdate = $birthdate;
		return $this;
	}
}