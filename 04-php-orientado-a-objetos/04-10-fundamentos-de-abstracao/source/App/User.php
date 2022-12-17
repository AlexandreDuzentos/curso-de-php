<?php

namespace Source\App;

class User
{
	private $firstname;
	private $lastname;

	public function __construct($firstname, $lastname)
	{
      $this->firstname = $firstname;
      $this->lastname = $lastname;
	}

	public function setFirstName($firstname)
	{
		$this->firstname = $firstname;
	}

	public function getFirstName()
	{
		return $this->firstname;
	}

	public function setLastName($lastname)
	{
		$this->lastname = $lastname;
	}

	public function getLastName()
	{
		return $this->lastname;
	}
}

?>