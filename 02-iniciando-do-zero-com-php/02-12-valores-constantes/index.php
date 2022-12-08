<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.12 - Constantes e constantes mágicas");

/*
 * [ constantes ] https://php.net/manual/pt_BR/language.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);

/*As constantes representam configurações do sistema que são imutáveis*/

/*A definiçaão de uma constante com o define está em Runtime(ocorre durante a execução), e com o const está em
 * compile time(que ocorre antes da execução)*/

define("COURSE","FULL STACK PHP Developer"); 
const AUTHOR = "Robson";

$formation = true;

if($formation){
    define("COURSE_TYPE","FORMAÇÃO");
} else {
    define("COURSE_AUTHOR","ROBSON");
}


echo "<p>COURSE_TYPE COURSE_AUTHOR</p>";
echo "<p>{COURSE_TYPE} {COURSE_AUTHOR}</p>";
echo "<p>",COURSE_TYPE, " de " ,AUTHOR,"</p>";
echo "<p>".COURSE_TYPE. " de " .AUTHOR."</p>";

class Config
{
    const USER = "root";
    const HOST = "localhost";
}

echo "<p>".Config::USER."</p>";
echo "<p>".Config::HOST."</p>";

var_dump(get_defined_constants(true)["user"]);



/*
 * [ constantes mágicas ] https://php.net/manual/pt_BR/language.constants.predefined.php
 */
fullStackPHPClassSession("constantes mágicas", __LINE__);


var_dump([
    __LINE__,
    __FILE__,
    __DIR__
    
]);

function fullStackPHP()
{
  return __FUNCTION__;  
}

var_dump(fullStackPHP());


trait MyTrait
{
    public $traitName = __TRAIT__;
}

class FsPHP
{
  use MyTrait;
  public $className = __CLASS__;
}

var_dump(new FsPHP());


require  __DIR__."/MyClass.php";
var_dump(new \Source\MyClass());
var_dump(\Source\MyClass::class);
