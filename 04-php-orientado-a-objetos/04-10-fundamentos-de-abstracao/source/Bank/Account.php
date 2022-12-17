<?php
namespace Source\Bank;

use \Source\App\Trigger;
use \Source\App\User;

abstract class Account
{
	protected $branch;
	protected $account;
	protected $client;
	protected $balance;

	protected function __construct($branch, $account,User $client, $balance)
	{
       $this->branch = $branch;
       $this->account = $account;
       $this->client = $client;
       $this->balance = $balance;
	}

	public function extract()
	{
		$extract = ($this->balance > 1 ? Trigger::ACCEPT : Trigger::ERROR);
		Trigger::show("EXTRATO: Saldo atual : {$this->balance}", $extract);
	}

	protected function toBrl($value)
	{
      return "R$ ". number_format($value, 2, ",", ".");
	}

	abstract public function deposit($value);
	abstract public function withdrawal($value);


	public function setBranch($branch)
	{
		$this->branch = $branch;
	}

	public function getBranch()
	{
		return $this->branch;
	}

	public function setAccount($account)
	{
		$this->account = $account;
	}

	public function getAccount()
	{
		return $this->account;
	}


	public function setClient($client)
	{
		$this->client = $cliente;
	}

	public function getClient()
	{
		return $this->client;
	}

	public function setBalance($balance)
	{
		$this->balance = $balance;
	}

	public function getBalance()
	{
		return $this->balance;
	}

}

?>