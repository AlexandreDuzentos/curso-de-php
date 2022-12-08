<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.04 - Carregamento automático");

/*
 * [ autoload spl psr-4 ] Carregamento de suas classes com spl_autoload psr-4
 */
fullStackPHPClassSession("autoload spl psr-4", __LINE__);

require __DIR__."/vendor/autoload.php";

//use \source\loading\Address;
use \Source\loading\User;

$user = new User();

var_dump($user);

/*
 * [ autoload composer psr-4 ] https://getcomposer.org/doc/00-intro.md
 */
fullStackPHPClassSession("autoload composer psr-4", __LINE__);

use \PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();
var_dump($mail);



