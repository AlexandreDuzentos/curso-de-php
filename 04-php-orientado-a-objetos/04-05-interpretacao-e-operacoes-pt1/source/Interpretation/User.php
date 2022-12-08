<?php

namespace source\Interpretation;

class User
{

	private $firstName;
	private $lastName;
	private $email;

	public function __construct($firstName,$lastName,$email){
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->email = $email;

	}
    
    // Método mágico chamado automáticamente quando um objecto desse classa é clonado.
	public function __clone(){
		$this->firstName = null;
		$this->lastName = null;
		$this->email = null;
	}
    
    // Método mágico chamado automáticamente quando a execução da classe chega ao final
	public function __destruct(){
		var_dump($this);
       echo "<p class='trigger accept'>O objecto {$this->firstName} foi destruído</p>";
	}

	public function setFirstName($firstName){
       $this->firstName = $firstName;
	} 

	public function getfirstName(){
		return $this->firstName;
	}

	public function setLastName($lastName){
		$this->lastName = $lastName;
	}

	public function getLastName(){
		return $this->lastName;
	}

	public function setEmail($email){
       $this->email = $email;
	} 

	public function getEmail(){
		return $this->email;
	}

}

?>