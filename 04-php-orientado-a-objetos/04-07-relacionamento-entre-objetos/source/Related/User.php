<?php

namespace Source\Related;

class User
{
	private $job;
	private $firstName;
	private $lastName;

	public function __construct($job, $firstName, $lastName)
	{
		$this->job = $job;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

	public function setJob($job)
	{
		$this->job = $job;
	}

	public function getJob()
	{
		return $this->job;
	}

	public function setFirstname($firstName)
	{
		$this->firstName = $firstName;
	}

	public function getFirstname()
	{
		return $this->firstName;
	}

	public function setLastname($lastName)
	{
		$this->lastName = $lastName;
	}

	public function getLastname()
	{
		return $this->lastName;
	}

}

?>