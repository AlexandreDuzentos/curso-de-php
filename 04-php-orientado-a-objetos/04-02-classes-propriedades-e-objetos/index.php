<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.02 - Classes, propriedades e objetos");

/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */
fullStackPHPClassSession("classe e objeto", __LINE__);
require_once __DIR__."/Classes/User.php";

$user = new User();
var_dump($user);



/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.properties.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

$user->firstName = "Alexadre";
$user->lastName = "Duzentos";
$user->email = "Aduzentos12@gmail.com";

var_dump($user);

echo "<p>O e-mail de {$user->firstName} é {$user->email}!</p>";





/*
 * [ métodos ] São as funções que definem o comportamento e a regra de negócios de uma classe
 */
fullStackPHPClassSession("métodos", __LINE__);


$user->setFirstName("Alexandre");
$user->setLastName("Duzentos");
$user->setEmail("Aduzentos12@gmail.com");

var_dump($user);

if(!$user->setEmail($user->email)){
    echo "<p class='trigger error'>O e-mail informado {$user->email} não é válido!</p>";  
} else {
    echo "<p class='trigger accept'> O e-mail informado {$user->email} é válido!</p>";
}