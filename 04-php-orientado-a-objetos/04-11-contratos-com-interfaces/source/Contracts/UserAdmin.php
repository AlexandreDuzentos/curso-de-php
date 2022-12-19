<?php

namespace Source\Contracts;

class UserAdmin extends User implements UserErrorInterface
{

	private $level;
	private $error;

public function __construct($firstName, $lastName, $email)
{
	parent::__construct($firstName, $lastName, $email);
}

public function setError($error)
{

}

public function getError()
{

}


}


?>