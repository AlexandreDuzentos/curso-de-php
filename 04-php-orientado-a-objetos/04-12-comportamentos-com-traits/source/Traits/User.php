<?php

namespace Source\Traits;

class User
{
	private $firstName;
	private $lastName;
	private $email;

	public function __construct($firstName, $lastName, $email)
	{
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->email = $email;
	}

	public function setFirstName($lastName)
	{
		$this->firstName;
	}

	public function getFirstName()
	{
		return $this->firstName;
	}

	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getEmail()
	{
		return $this->email;
	}
}

?>