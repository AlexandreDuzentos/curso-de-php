<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$index = [
    "AC/DC",
    "NIRVANA",
    "ALTER BRIDGE"
];

$assoc = [
    "band_1" => "AC/DC",
    "band_2" => "NIRVANA",
    "band_3" => "ALTER BRIDGE"
];

array_unshift($index,"METALLICA","BEATLES"); // Adiciona elementos no início do array
$assoc = $assoc + ["band_4" => "pearl jam","band_5" => ""];


array_push($index,"QUEEN","LED ZEPLLIN"); // Adiciona elementos no final do array
$assoc = $assoc + ["band_6" => "Beatles"];


array_shift($assoc); // Remove elementos no início do array

array_pop($index); // Remove elementos no final do array



$assoc = array_filter($assoc); // Remove elementos vazios no array

var_dump([
    $index,
    $assoc
]);


/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

$index = array_reverse($index); // REVERTE A POSIÇAO DOS ELEMENTOS DO ARRAY
$assoc = array_reverse($assoc);
asort($index); // ORDENA POR ORDEM ALFABETICA
asort($assoc);

ksort($index); //ORDENAR ARRAYS INDEXADOS PELO ÍNDICE
krsort($index); // ORDENAR ARRAY INDEXADOS PELO ÍNDICE NA ORDEM INVERSA

sort($index); // ORDENA ALFABETICAMENTE E REINDEXA OS ÍNDICES
//rsort($index); // ORDENA ALFABETICAMENTE E REINDEXA OS ÍNDICES NA ORDEM INVERSA

var_dump([
    $index,
    $assoc,
    
]);




/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

var_dump([
    array_keys($assoc),
    array_values($assoc)
]);

array_push($assoc,"AC/DC");

if(in_array("AC/DC",$assoc)){
    echo "<p>Cause I'm back!</p>";
}

/* CONVERTE UM ARRAY PARA STRING,O PRIMEIRO ARGUMENTO É O SEPARADOR DOS ELEMENTOS DO ARRAY NA STRING*/
$arrToString = implode(", ",$assoc); 

$stringToArr = explode(", ",$arrToString);


var_dump(
    [
     $arrToString,
     $stringToArr    
    ]
);


/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);


$profile = [
    "Name" => "Alexandre",
    "Conpany" => "CEO",
    "Email" => "Aduzentos12@gmail.com",
];

$template = <<<TPL
     <article>
       <h1>Name</h1>
       <p>Conpany</p>
       <a title="Enviar email para Email" href="mailto:Email">Enviar email</a>
     </article>
 TPL;


echo str_replace(array_keys($profile),array_values($profile),$template);

