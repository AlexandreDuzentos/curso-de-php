<?php

namespace Source\Traits;


class Register
{
    // Importa as trait - seus comportamento e atributos
	use UserTrait;
    use AddressTrait;

	public function __construct(User $user, Address $address)
	{
       $this->setUser($user);
       $this->setAddress($address);
       $this->save();

	}

	public function save()
	{
      $this->user->id = 232;
      $this->address->id = $this->user->id;
	}
}

?>