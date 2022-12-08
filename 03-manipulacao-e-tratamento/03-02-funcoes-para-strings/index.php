<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.02 - Funções para strings");

/*
 * [ strings e multibyte ] https://php.net/manual/en/ref.mbstring.php
 */
fullStackPHPClassSession("strings e multibyte", __LINE__);

/*O multibyte interpreta os acentos como acentos e não caracteres*/

$string = "O último show de AC/DC foi incrível";

var_dump([
    "string" => $string,
    "strlen" => strlen($string), // Conta o tamanho da string
    "mb_strlen" => mb_strlen($string),
    "substr" => substr($string, 14), // Faz um recorte na string a partir de posições especificadas
    "mb_substr" => mb_substr($string,14),
    "strtoupper" => strtoupper($string),
    "mb_strtopper" =>mb_strtoupper($string)
    
]);


/**
 * [ conversão de caixa ] https://php.net/manual/en/function.mb-convert-case.php
 */
fullStackPHPClassSession("conversão de caixa", __LINE__);

$mbString = $string;

var_dump([
    "mb_strtoupper" => mb_strtoupper($mbString),
    "mb_strtolower" => mb_strtolower($mbString),
    "mb_convert_case UPPER" => mb_convert_case($mbString,MB_CASE_UPPER),
    "mb_convert_case LOWER" => mb_convert_case($mbString,MB_CASE_LOWER),
    "mb_convert_case TITLE" => mb_convert_case($mbString,MB_CASE_TITLE)
]);



/**
 * [ substituição ] multibyte and replace
 */
fullStackPHPClassSession("substituição", __LINE__);

$mbReplace = $mbString . "Fui, iria novamente";

var_dump([
    "mb_strlen" => mb_strlen($mbReplace),
    "mb_strpos" => mb_strpos($mbReplace,"i"),
    "mb_strrpos" =>mb_strrpos($mbReplace,"i"),
    "mb_substr" => mb_substr($mbReplace, 40 + 2, 14), // faz um recorte na string a partir da posição
    "mb_strstr" => mb_strstr($mbReplace,"i",true), // faz um recorte na string a partir de um caractere
    //(false: recorta da esquerda para a direita e o true da direita para a esquerda) 
    "mb_strrchr" => mb_strrchr($mbReplace, "i",true) // recorta a partir da última ocorrência do caractere na string
]); 

$mbStrReplace = $string;

echo "<p>{$mbStrReplace}</p>";

echo "<p>".str_replace("AC/DC","NIRVANA",$mbStrReplace)."</p>";


echo "<p>".str_replace(["AC/DC","show","incrível"],["NIRVANA","concerto","péssimo"],$mbStrReplace)."</p>";


$article = <<<ROCK
  <article>
  <h3>event</h3>
  <p>desc</p>
  </article>

ROCK;

$articleData = [
   "event" => "Rock in rio",
    "desc" => $mbReplace
];

echo str_replace(array_keys($articleData),array_values($articleData),$article);




/**
 * [ parse string ] parse_str | mb_parse_str
 */
fullStackPHPClassSession("parse string", __LINE__);


$endPoint = "name=Alexandre&email=Aduzentos12@gmail.com";

mb_parse_str($endPoint,$parseEndPoint); // Convete uma query string em um array


var_dump([
    $endPoint,
    $parseEndPoint,
    (object)$parseEndPoint
]);