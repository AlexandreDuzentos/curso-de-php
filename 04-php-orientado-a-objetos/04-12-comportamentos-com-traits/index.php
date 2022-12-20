<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.12 - Comportamentos com traits");

require __DIR__ . "/source/autoload.php";

/*
 * [ trait ] São traços de código que podem ser reutilizados por mais de uma classe. Um trait é como um comportamento
 * do objeto (BEHAVES LIKE). http://php.net/manual/pt_BR/language.oop5.traits.php
 */
fullStackPHPClassSession("trait", __LINE__);

use \Source\Traits\User;
use \Source\Traits\Address;
use \Source\Traits\Register;

$user = new User("Alexandre", "Duzentos", "Aduzentos12@gmail");
$address = new Address("Nome da rua",3339,"Casa 10");

$register = new Register($user,$address);

var_dump(
    $register,
    $register->getUser(),
    $register->getAddress(),
    $register->getUser()->getFirstName(),
    $register->getAddress()->getStreet(),
);


use \Source\Traits\Cart;

$cart = new Cart();
$cart->add(1, "Full Stack PHP Developer",3, 2000);
$cart->add(2, "Laravel developer", 2,1500);
$cart->add(3, "WS PHP", 4, 500);

$cart->remove(1,2);
$cart->remove(1,1);

$cart->checkout($user, $address);


var_dump($cart);



