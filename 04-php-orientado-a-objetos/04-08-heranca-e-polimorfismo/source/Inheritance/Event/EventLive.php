<?php

namespace Source\Inheritance\Event;

use Source\Inheritance\Address;
use DateTime;

class EventLive extends Event
{
	private $address;

	public function __construct($event, DateTime $date, $price, $vacancies, Address $address)
	{
      parent::__construct($event, $date, $price, $vacancies);
      $this->address = $address;
	}

	public function setAddress($address)
	{
		$this->address = $address;
	}
}

?>