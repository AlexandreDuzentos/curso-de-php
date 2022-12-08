<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.03 - Comandos de sa�da");

/**
 * [ echo ] https://php.net/manual/pt_BR/function.echo.php
 */
fullStackPHPClassSession("echo", __LINE__);

// O echo é o mais permissivo,mais recursivo e mais utilizado comando de sa�da
// A próxima linha de código é quem representa o erro quando um esquecido um ;(ponto e vírgula)
// Uma variável dentro de aspas simples, o php não interpreta seu valor,interpreta literalmente a variavel

Echo "<p>Hello world</p>";
echo "<p>Olá mundo! <span class='tag'>#Bora programar<span></p>";

$hello = "<p>Olá mundo!</p>";
$code = "<span class='tag'>#Bora programar</span>";

echo "<p>$hello</p>";

echo '<p>$hello</p>';

$day = "dia";
$days = "dias";
    
echo "<p>Falta 1 $day para o evento!</p>";
echo "<p>Falta 2 {$day}s para o evento!</p>";
echo "<p>Falta 2 $days para o evento!</p>";

echo "<p>$hello  $code</p>";
echo "<p>{$hello}  {$code} </p>";
echo "<h3>" . $hello . " " . $code . "</h3>";
echo "<h3>", $hello ," ", $code , "</h3>";

echo $hello.$code." não";
echo $hello,$code," Yes";



/**
 * [ print ] https://php.net/manual/pt_BR/function.print.php
 */
fullStackPHPClassSession("print", __LINE__);

print $hello.$code;
print "$hello $code";
print "{$hello} {$code}";
print $hello.$code;
/**
 * [ print_r ] https://php.net/manual/pt_BR/function.print-r.php
 */
fullStackPHPClassSession("print_r", __LINE__);

$array = [
    "Conpany" => "Upinisde",
    'Course' => "FSPHP",
    'Class' => "Comando de saída"
];

print_r($array);

$retorno = print_r($array,true);

echo "<pre> ",$retorno," </pre>";


/**
 * [ printf ] https://php.net/manual/pt_BR/function.printf.php
 */
fullStackPHPClassSession("printf", __LINE__);

$article = "<article><h1>%s</h1><p>%s</p></article>";

$title = "{$hello} {$code}";
$subtitle = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.
 Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an 
unknown printer took a galley of type and scrambled it to make a type specimen book. 
It has survived not only five centuries, but also the leap into
electronic typesetting, remaining essentially unchanged. It was
 popularised in the 1960s with the release of Letraset sheets 
containing Lorem Ipsum passages, and more recently with desktop
 publishing software like Aldus PageMaker including versions of
 Lorem Ipsum.";

printf($article,$title,$subtitle);

$retorno = Sprintf($article,$title,$subtitle);

echo $retorno;

/**
 * [ vprintf ] https://php.net/manual/pt_BR/function.vprintf.php
 */
fullStackPHPClassSession("vprintf", __LINE__);

$company = "<article><h1>Escola %s</h1><p>curso <b>%s</b>, aula <b>%s</b></p></article>";
vprintf($company,$array);
$retorno = vsprintf($company,$array);

echo $retorno;


/**
 * [ var_dump ] https://php.net/manual/pt_BR/function.var-dump.php
 */
fullStackPHPClassSession("var_dump", __LINE__);

var_dump($array);