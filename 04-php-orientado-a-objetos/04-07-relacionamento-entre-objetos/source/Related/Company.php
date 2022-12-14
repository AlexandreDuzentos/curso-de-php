<?php

namespace Source\Related;

class Company
{
	private $company;

	/*
     * @var Address
	*/
	private $address;
	private $team;
	private $products;

	public function bootCompany($company, $address)
	{
       $this->company = $company;
       $this->address = $address;
	}

    // EXEMPLO ASSOCIAÇÃO
	public function boot($company, Address $address)
	{
      $this->company = $company;
      $this->address = $address;
	}
     
     // EXEMPLO AGREGAÇÃO
	public function addProduct(Product $product)
	{
      $this->products[] = $product;
	}

	public function addTeamMember($job, $firstName, $lastName)
	{
       $this->team[] = new \Source\Related\User($job, $firstName, $lastName);
	}

	public function setCompany() 
	{
       $this->company = $company;
	}

	public function getCompany() 
	{
       return $this->company;
	}

	public function setAddress()
	{
       $this->address = $address;
	}

	public function getAddress() : Address
	{
       return $this->address;
	}

	public function setTeam()
	{
       $this->team = $team;
	}

	public function getTeam()
	{
       return $this->team;
	}

	public function setProducts()
	{
       $this->products = $products;
	}

	public function getProducts()
	{
       return $this->products;
	}

}

?>