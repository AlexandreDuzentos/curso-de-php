<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.04 - Variáveis e tipos de dados");

/**
 * [tipos de dados] https://php.net/manual/pt_BR/language.types.php
 * [ variáveis ] https://php.net/manual/pt_BR/language.variables.php
 */
fullStackPHPClassSession("variáveis", __LINE__);
$userFirstName = "Alexandre";
$userLastName = "Duzentos";


echo "<h3>{$userFirstName} {$userLastName}</h3>";

$user_first_name = $userFirstName;
$user_last_name = $userFirstName;


echo "<h3>{$user_first_name} {$user_last_name}</h3>";

$userAge = 19;
    
 echo "<p>O usuário {$user_first_name} {$user_last_name} <span class='tag'> tem {$userAge}<span></p>";
 
 $userEmail = "Aduzentos12@gmail.com";
 echo $userEmail;
 
 $calcA = 10;
 $calcB = 20;
 //$calcB = $calcA;
 $calcB = &$calcA;
 $calcB = 20;
 
 var_dump([
   "a" => $calcA,
   "b" => $calcB     
 ]);
 
 


/**
 * [ tipo boleano ] true | false
 */
fullStackPHPClassSession("tipo boleano", __LINE__);

$true = true;
$false = false;

$bestAge = ($userAge > 10);
var_dump($bestAge);

//Dados considerados como falso por pradrão, por representarem o nada o vazio;
$a = 0;
$b = 0.0;
$c = "";
$d = [];
$e = null;

var_dump($a,$b,$c,$d,$e);

if($a || $b || $c || $d || $e){
    var_dump(true);
}else{
    var_dump(false);
}

/**
 * [ tipo callback ] call | closure
 */
fullStackPHPClassSession("tipo callback", __LINE__);

$code = "<article><h1>Um call user function!</h1></article>";

$codeClear = call_user_func("strip_tags",$code);
var_dump($code,$codeClear);

$codeMore = function($code){
    var_dump($code);
};

$codeMore("#Bora programar!");


/**
 * [ outros tipos ] string | array | objeto | numérico | null
 */
fullStackPHPClassSession("outros tipos", __LINE__);

$string = "Olá mundo";
$array = [$string];
$object = new StdClass();
$object->hello = $string;
$null = null;
$int = 123;
$float = 12.6;

var_dump([
    $string,
    $array,
    $object,
    $null,
    $int,
    $float
]);