<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.11 - Interação com URLs");

/*
 * [ argumentos ] ?[&[&][&]]
 */
fullStackPHPClassSession("argumentos", __LINE__);

echo "<p><a href='index.php'>Clear...</a></p>";
echo "<p><a href='index.php?name=Alexandre&sobrenome=Duzentos&bairro=futungo de belas'>Me</a></p>";

var_dump($_GET);

$data = [
    "firstName" => "Alexandre",
    "lastName" => "Duzentos",
    "email" =>"Aduzentos12@gmail.com",
    "mother" => "Teresa Bande",
    "father" => "Salvador Duzentos",
];

$data = http_build_query($data); // Converte um array para uma query string
$object = (object)$data;
var_dump([
    $data,
    $object,
]);



/*
 * [ segurança ] get | strip | filters | validation
 * [ filter list ] https://php.net/manual/en/filter.filters.php
 */
fullStackPHPClassSession("segurança", __LINE__);


$dataFilter = http_build_query([
    "name" => "Alexandre",
    "conpany" => "CEO",
    "email" => "ceo@gmail.com",
    "site" => "ceo-ao.ao",
    "script" => "<script>alert('Esse é um javascript')<script>",
]);


echo "<p><a href='index.php?{$dataFilter}'>Data filter</a></p>";

$dataUrl = filter_input_array(INPUT_GET,FILTER_DEFAULT);
// O $dataUrl dentro do if está a testar se o array tem conteúdo

// PÓS FILTRO
if($dataUrl){
    if(in_array("",$dataUrl)){
        echo "<p class='trigger warning'>Faltam dados!</p>";
    } elseif (!filter_var($dataUrl['email'],FILTER_VALIDATE_EMAIL)){
        echo "<p class='trigger warning'>Email inválido!</p>";
    } else {
        $finalData = array_map("strip_tags",$dataUrl);
        var_dump($finalData);
        echo "<pclass='trigger accept'>Tudo certo!</p>";
    }
} else {
    echo "<p class='trigger warning'>Array vázio</p>";
}

//PRÉ-FILTRO
$dataFilter = [
    "name" => "Alexandre",
    "conpany" => "CEO",
    "email" => "ceo@gmail.com",
    "site" => "ceo-ao.ao",
    "script" => "<script>alert('Esse é um javascript')<script>",
];


$filter = [
    "name" => FILTER_SANITIZE_STRIPPED,
    "conpany" => FILTER_SANITIZE_STRIPPED,
    "email" => FILTER_VALIDATE_EMAIL,
    "site" => FILTER_VALIDATE_DOMAIN,
    "script" => FILTER_SANITIZE_STRIPPED,
 ];
 
 $dataFiltered = filter_var_array($dataFilter,$filter);
 
 var_dump([
     $dataFiltered,
 ]);




