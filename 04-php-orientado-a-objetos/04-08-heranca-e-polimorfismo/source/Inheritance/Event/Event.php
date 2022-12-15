<?php

namespace Source\Inheritance\Event;
use DateTime;

class Event
{
  private $event;
  private $date;
  private $price;

  private $registers;
  protected $vacancies;

  public function __construct($event, DateTime $date, $price, $vacancies)
  {
    $this->event = $event;
    $this->date = $date;
    $this->price = $price;
    $this->vacancies = $vacancies;
  }

  public function register($fullName, $email)
  {
  	if($this->vacancies >= 1){
  		$this->vacancies -= 1;
  		$this->setRegister($fullName, $email);
  		echo "<p class='trigger accept'>Parabéns {$fullName}, vagas garantidas!</p>";
  	} else {
  		echo "<p class='trigger error'>Desculpe {$fullName}, mas as  vagas esgotaram!</p>";
  	}

  }

  public function setRegister($fullName, $email)
  {
     $this->register = [
     	"name" => $fullName,
     	"email" => $email
     ];
  }

  public function setEvent($event)
  {
  	$this->event = $event;
  }

  public function getEvent()
  {
  	return $this->event;
  }


  public function setDate(DateTime $date)
  {
  	$this->date = $date;
  }

  public function getDate()
  {
  	return $this->date->format("d/m/Y H:i");
  }


  public function setPrice($price)
  {
  	$this->price = $price;
  }

  public function getPrice()
  {
  	return number_format($this->price, 2, ",", ".");
  }

   public function setVacancies($vacancies)
  {
  	$this->vacancies = $vacancies;
  }

  public function getVacancies()
  {
  	return $this->vacancies;
  }


}

?>