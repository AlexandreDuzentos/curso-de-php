<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.11 - Contratos com interfaces");

require __DIR__ . "/source/autoload.php";

/*
 * [ implementacão ] Um contrato de quais métodos a classe deve implementar
 * http://php.net/manual/pt_BR/language.oop5.interfaces.php
 */
fullStackPHPClassSession("implementacão", __LINE__);

use \Source\Contracts\User;

$user = new User("Alexandre", "Duzentos","Aduzentos12gmail");
var_dump($user);

use \Source\Contracts\UserAdmin;

$admin = new UserAdmin("Akeny","Mundombe", "AkenyMundombe15@gmail.com","Agnela12");

var_dump($admin);



/*
 * [ associação ] Um exemplo associando ao login
 */
fullStackPHPClassSession("associação", __LINE__);

use \Source\Contracts\Login;

$login = new Login();

$loginUser = $login->loginUser($user);
$loginAdmin = $login->loginAdmin($admin);

var_dump($login);



/*
 * [ dependência ] Dependency Injection ou DI, é um contrato de relação entre objetos, onde
 * um método assina seus atributos com uma interface.
 */
fullStackPHPClassSession("dependência", __LINE__);

var_dump(
    $login->login($user),
    $login->login($user)->getLastName(),
    $login->login($admin),
    $login->login($admin)->getLastName()
);




