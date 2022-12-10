<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.06 - Interpretação e operações pt2");

require __DIR__ . "/source/autoload.php";

/*
 * [ set ] Executado automaticamente quando se tenta manipular uma propriedade inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.set
 *
 * inacessível = propridade é privada ou não existe
 */
fullStackPHPClassSession("__set", __LINE__);

use \source\interpretation\Product;

$product = new Product();
$product->handler("Full Stack PHP Developer",1997);

$product->name = "FSPHP";
$product->title = "FSPHP";
$product->value = 1997;
//$product->price = 1997;
var_dump($product);

$product->title = "Full Stack PHP Developer";
$product->conpany = "UpInside";


/*
 * [ get ] Executado automaticamente quando se tenta obter uma propriedade inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.get
 *
 */
fullStackPHPClassSession("__get", __LINE__);

echo "<p>O curso {$product->title} da {$product->conpany} é o melhor curso de PHP do mercado</p>";

/*
 * [ isset ] Executada automaticamente quando um teste ISSET ou EMPTY é executado em uma propriedade inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.isset
 */
/*
o isset testa apenas se a variável existe, o empty testa se a variável existe e se tem conteúdo
*/
fullStackPHPClassSession("__isset", __LINE__);
isset($product->phone);
isset($product->name);

empty($product->address);




/*
 * [ call ] Executada automaticamente quando se tenta usar um método inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.call
 *
 */
fullStackPHPClassSession("__call", __LINE__);

$product->notFound("oppps", "Teste");
$product->setPrice(1997,10);


/*
 * [ unset ] Executada automaticamente quando se tenta usar um echo em um objecto da classe
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.unset
 */
fullStackPHPClassSession("__toString", __LINE__);

echo $product;


/*
 * [ unset ] Executada automaticamente quando se tenta usar unset em uma propriedade inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.unset
 */
fullStackPHPClassSession("__unset", __LINE__);

unset(
    $product->name,
    $product->price,
    $product->data
);

var_dump($product);
