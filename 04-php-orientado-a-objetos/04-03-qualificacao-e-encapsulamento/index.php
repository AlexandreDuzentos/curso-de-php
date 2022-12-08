<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.03 - Qualificação e encapsulamento");

/*
 * [ namespaces ] http://php.net/manual/pt_BR/language.namespaces.basics.php
 */
fullStackPHPClassSession("namespaces", __LINE__);

require_once __DIR__."/Classes/App/Template.php";
require_once __DIR__."/Classes/Web/Template.php";


$appTemplate = new App\Template();
$webTemplate = new App\Template();

Var_dump($appTemplate,$webTemplate);

use App\Template as appTemplate;
use Web\Template as webTemplate;

$app = new appTemplate();
$web = new webTemplate();

var_dump($app, $web);



/*
 * [ visibilidade ] http://php.net/manual/pt_BR/language.oop5.visibility.php
 */
fullStackPHPClassSession("visibilidade", __LINE__);

require_once __DIR__."/source/Qualified/User.php";

use source\Qualified\User;

$user = new User();

/*
$user->setFirstName("Alexandre");
$user->setLastName("Duzentos");
*/

var_dump(
    $user,
    get_class_methods($user)
    );

echo "<p>O e-mail de {$user->getFirstName()} é {$user->getEmail()}</p>";


/*
 * [ manipulação ] Classes com estruturas que abstraem a rotina de manipulação de objetos
 */
fullStackPHPClassSession("manipulação", __LINE__);


$alexandre = new User();

if(!$alexandre->setUser("Alexandre","Duzentos","Aduzentos12gmail.com")){
    echo "<p class='trigger error'>{$alexandre->getError()}</p>";
} else {
    echo "<p class='trigger accept'>E-mail {$alexandre->getEmail()} de {$alexandre->getFirstName()} está correto</p>";
}


var_dump($alexandre);
