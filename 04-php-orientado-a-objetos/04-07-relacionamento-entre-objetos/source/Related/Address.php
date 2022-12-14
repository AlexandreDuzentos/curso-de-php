<?php

namespace Source\Related;

class Address
{

	private $street;
	private $number;
	private $complement;

	public function __construct($street, $number, $complement)
	{
		$this->street = $street;
		$this->number = $number;
		$this->complement = $complement;
	} 

	public function setStreet()
	{
		$this->street = $street;
	}

	public function getStreet()
	{
      return $this->street;
	}

	public function setNumber()
	{
		$this->number = $number;
	}

	public function getNumber()
	{
      return $this->number;
	}

	public function setComplement()
	{
		$this->complement = $complement;
	}

	public function getComplement()
	{
      return $this->complement;
	}

}

?>