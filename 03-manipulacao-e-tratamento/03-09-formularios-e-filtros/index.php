<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.09 - Formuários e filtros");

/*
 * [ request ] $_REQUEST
 * https://php.net/manual/pt_BR/book.filter.php
 */
fullStackPHPClassSession("request", __LINE__);

$form = new stdClass();
$form->name = "unknown";
$form->mail = "unknown16@gmail.com";

$form->method = "get";
$form->method = "post";

require __DIR__."/form.php";

var_dump($_REQUEST);

/*
 * [ post ] $_POST | INPUT_POST | filter_input | filter_var
 */
fullStackPHPClassSession("post", __LINE__);

var_dump($_POST); //NÃO É RECOMENDADO USAR DIRECTAMENTE AS GLOBAIS DO PHP POR RAZÕES DE SEGURANÇA

$post = filter_input(INPUT_POST,"name",FILTER_DEFAULT);
$postArray = filter_input_array(INPUT_POST,FILTER_DEFAULT);

var_dump([
    $post,
    $postArray,
]);

if($postArray){
    if(in_array("",$postArray)){
        echo "<p class='trigger warning'>Preencha todos os campos!</p>";
    } else if (!filter_var($postArray['mail'],FILTER_VALIDATE_EMAIL)){
        echo "<p class='trigger warning'>Email informado não é válido!</p>";
    } else {
        $saveStrip = array_map("strip_tags",$postArray);
        $save = array_map("trim",$saveStrip);
        var_dump($save);
        echo "<p class='trigger accept'>Cadastro com sucesso!</p>";
    }
}

$form->method = "post";
require __DIR__."/form.php";
/*
 * [ get ] $_GET | INPUT_GET | filter_input | filter_var
 */
fullStackPHPClassSession("get", __LINE__);

var_dump($_GET);

$get = filter_input(INPUT_GET,"mail",FILTER_DEFAULT);
$getArray = filter_input_array(INPUT_GET,FILTER_DEFAULT);

var_dump([
    $get,
    $getArray,
]);


$form->method = "get";
require __DIR__."/form.php";




/*
 * [ filters ] list | id | var[_array] | input[_array]
 * http://php.net/manual/pt_BR/filter.constants.php
 */
fullStackPHPClassSession("filters", __LINE__);

/*
 * DIFERENÇA ENTRE FILTER_VALIDATE E FILTER SANITIZE
 * O FILTER_VALIDATE VALIDA UM FORMATO ESPECIFICO
 * OP FILTER_SANITIZE ELEMINA CARACERÍSTICAS DE UM FORMATO ESPECCÍFICO
 * 
 
 */

var_dump([
   "lista de filtros" =>  filter_list(),
    "id de um filtro específico(boolean)" => filter_id("boolean"),
    "id de um filtro espeçifico(string)" => filter_id("string"),
    FILTER_SANITIZE_STRING,
]);

$filterForm = [
    "name" => FILTER_SANITIZE_STRIPPED,
    "mail" => FILTER_VALIDATE_EMAIL,
];

$getForm = filter_input_array(INPUT_GET,$filterForm);
var_dump($getForm);

$data = [
    "name" => "<sript>Alexandre alert('olá mundo')</script>",
    "mail" => "cursoupinside.com.br",
];

$email = "Aduzentos12gmail";

var_dump([
    filter_var($email,FILTER_VALIDATE_EMAIL),
    filter_var_array($data,$filterForm),
]);


