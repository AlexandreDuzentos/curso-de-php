<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.08 - Herança e polimorfismo");

require __DIR__ . "/source/autoload.php";

/*
 * [ classe pai ] Uma classe que define o modelo base da estrutura da herança
 * http://php.net/manual/pt_BR/language.oop5.inheritance.php
 */
fullStackPHPClassSession("classe pai", __LINE__);

use Source\Inheritance\Event\Event;



$event = new Event("Feira de programação",new DateTime("15-12-2022"),700, 4);
var_dump($event);

$event->register("Alexandre B.J Duzentos","Aduzentos12@gmail.com");
$event->register("Akeny Morais Mundombe","AkenyMundombe15@gmail.com");
$event->register("Banguito Gloria Lopes","BanguitoLopes18@gmail.com");
$event->register("João B.J Duzentos","Jduzentos16@gmail.com");
$event->register("Heraldo Mussubo","Heraldo11@gmail.com");

var_dump($event);



/*
 * [ classe filha ] Uma classe que herda a classe pai e especializa seuas rotinas
 */
fullStackPHPClassSession("classe filha", __LINE__);

use Source\Inheritance\Event\EventLive;
use Source\Inheritance\Address;

$address = new Address("Rua dos eventos","1287");
$date = new DateTime("15-12-2022");

$eventLive = new EventLive("WorkShop FSPHP", $date, 2500, 4, $address);
var_dump($eventLive);

$eventLive->register("Alexandre B.J Duzentos","Aduzentos12@gmail.com");
$eventLive->register("Akeny Morais Mundombe","AkenyMundombe15@gmail.com");
$eventLive->register("Banguito Gloria Lopes","BanguitoLopes18@gmail.com");
$eventLive->register("João B.J Duzentos","Jduzentos16@gmail.com");
$eventLive->register("Heraldo Mussubo","Heraldo11@gmail.com");

/*
 * [ polimorfismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) a class
 * pai, mas altera o comportamento desses métodos para se especializar
 */
fullStackPHPClassSession("polimorfismo", __LINE__);

use Source\Inheritance\Event\EventOnline;

$eventOnline = new EventOnline("WorkShop FSPHP", $date, 2500,"https://www.ceo.ao",4);

var_dump($eventOnline);

$eventOnline->register("Alexandre B.J Duzentos","Aduzentos12@gmail.com");
$eventOnline->register("Akeny Morais Mundombe","AkenyMundombe15@gmail.com");
$eventOnline->register("Banguito Gloria Lopes","BanguitoLopes18@gmail.com");
$eventOnline->register("João B.J Duzentos","Jduzentos16@gmail.com");
$eventOnline->register("Heraldo Mussubo","Heraldo11@gmail.com");

var_dump($eventOnline);