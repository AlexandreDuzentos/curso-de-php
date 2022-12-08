<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.05 - Interpretação e operações pt1");

require __DIR__ ."/source/autoload.php";

/*
 * [ construct ] Executado automaticamente por meio do operador new
 * http://php.net/manual/pt_BR/language.oop5.decon.php
 */
fullStackPHPClassSession("__construct", __LINE__);

use source\Interpretation\User;

$user = new User("Alexandre","Duzentos","Aduzentos12gmail");
var_dump($user);


/*
 * [ clone ] Executado automaticamente quando um novo objeto é criado a partir do operador clone.
 * http://php.net/manual/pt_BR/language.oop5.cloning.php
 */
fullStackPHPClassSession("__clone", __LINE__);

//É atribuído o objecto original para um novo objeto, a instância do objecto é a mesma na variável que recebe o objecto.
$akeny = $user;
$akeny->setFirstName("Akeny");
$akeny->setLastName("Morais");
$akeny->setEmail("akenymorais@gmail.com");
var_dump($akeny);

//É atribuído um clone do objecto original para um novo objeto, a instância do objecto não é a mesma na variável que recebe o clone do objecto.
$bl = clone $user;
$bl->setFirstName("Banguito");
$bl->setLastName("Lopes");
$bl->setEmail("Banguitolopes@gmail.com");
var_dump($bl);





/*
 * [ destruct ] Executado automaticamente quando o objeto é finalizado
 * http://php.net/manual/pt_BR/language.oop5.decon.php
 */
fullStackPHPClassSession("__destruct", __LINE__);


var_dump($user,$bl);