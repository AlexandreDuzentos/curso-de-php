<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.04 - Manipulação de objetos");

/*
 * [ manipulação ] http://php.net/manual/pt_BR/language.types.object.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$arrProfile = [
    "name" => "Alexandre",
    "conpany" => "CEO",
    "mail" => "Aduzentos12@gmail.com"
];

$objProfile = (object)$arrProfile;

echo "<p>{$arrProfile['name']} trabalha na {$arrProfile['conpany']}</p>";
echo "<p>{$objProfile->name} trabalha na {$objProfile->conpany}</p>";


$ceo = $objProfile;
unset($ceo->conpany); // Remove atributos da do objecto;

var_dump($ceo);

$company = new StdClass();
$company->name = "Upinside";
$company->ceo = "Robson Leite";
$company->mail = "RobsonLeite@gmail.com";
$company->manager = new StdClass();
$company->manager->name = "kaue";
$company->manager->email = "kauesousa@gmail.com";
$company->ceo = $ceo; 

var_dump($company);



/**
 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);


$date = new DateTime();
$PDOException = new PDOException();
$exception = new Exception();


var_dump([
    "class" => get_class($date),
    "methods" => get_class_methods($date),
    "vars" => get_object_vars($date),
    "parent" => get_parent_class($date),
    "subclass" => is_subclass_of($PDOException,"Exception")
]);