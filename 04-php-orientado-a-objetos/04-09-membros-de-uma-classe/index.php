<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.09 - Membros de uma classe");

require __DIR__ . "/source/autoload.php";

// Membros estáticos são aquelas a quais o objecto não tem acesso, ou seja, não fazem parte do objecto, apenas da classe.

/*
 * [ constantes ] http://php.net/manual/pt_BR/language.oop5.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);

use Source\Members\Config;

$config = new Config();
var_dump($config); // Quando o objecto é debugado as constantes não são impressas, porque não fazem parte do objecto, apenas da classe

echo "<p>".$config::COMPANY."</p>";

var_dump(
    Config::COMPANY,
    //Config::DOMAIN,
    //Config::SETOR
);

// Para debugarmos membros estáticos no PHP, usamos uma classe chamada ReflectionClass.
// A ReflectionClass nos permite acessar qualquer membro de uma classe independente da acessibilidade

$reflection = new ReflectionClass("\Source\Members\Config"); // Parâmetro podia ter sido Config::class
var_dump($reflection, get_class_methods($reflection)); 
var_dump($reflection, $reflection->getConstants());



/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

var_dump($config); // Não reconhecerá as propriedades estáticas  como membro do objecto, uma vez que elas não são.



var_dump($reflection->getProperties());

Config::$company = "UpInside";
Config::$domain = "UpInside.com.br";
Config::$setor = "Educação";

// Mesmo que o acesso ao membro seja atravês do objecto, a mamipulação não ocorre no objecto, ocorre na classe
$config::$setor = "Tecnologia";

var_dump(
    Config::$company,
    Config::$domain,
    Config::$setor
);

var_dump($reflection->getDefaultProperties());


/*
 * [ métodos ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("métodos", __LINE__);

$config::setConfig("", "", "");
Config::setConfig("UpInside","upinside.com.br","Educação");

var_dump($config, $reflection->getMethods(),$reflection->getDefaultProperties());


/*
 * [ exemplo ] Uma classe trigger
 */
fullStackPHPClassSession("exemplo", __LINE__);

use \Source\Members\Trigger;

$trigger = new Trigger();

$trigger::show("Um objecto trigger");

var_dump($trigger);


Trigger::show("Está é um mensagem para o usuário!");
Trigger::show("Está é um mensagem para o usuário!",Trigger::ACCEPT);
Trigger::show("Está é um mensagem para o usuário!",Trigger::WARNING);
Trigger::show("Está é um mensagem para o usuário!",Trigger::ERROR);

echo Trigger::push("Está é um mensagem para o usuário!",Trigger::ACCEPT);
echo Trigger::push("Está é um mensagem para o usuário!",Trigger::WARNING);
echo Trigger::push("Está é um mensagem para o usuário!",Trigger::ERROR);

