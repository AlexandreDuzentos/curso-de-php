<?php

namespace Source\Contracts;

class Login
{
	private $logged;

	public function loginUser(User $user) : User
	{
      $this->logged = $user;
      return $this->logged;
	}

	public function loginAdmin(UserAdmin $userAdmin) : UserAdmin
	{
		 $this->logged = $userAdmin;
         return $this->logged;
	}


    /**
     * Qualquer objeto que implemente a interface UserInterface pode ser passada no parâmetro desse método, esse é um padrão de projeto chamado injeção de dependência.
     */
	public function login(UserInterface $user)
	{
        $this->logged = $user;
         return $this->logged;
	}
}

?>