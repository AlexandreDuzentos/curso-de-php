<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.12 - Cookies e sessões");

/*
 * [ cookies ] http://php.net/manual/pt_BR/features.cookies.php
 */
fullStackPHPClassSession("cookies", __LINE__);

setcookie("ceo","Seja bem vindo a página",time() + 60 * 60 * 24 * 7 * 4);//Definindo um cookie
//setcookie("ceo", null,time() - 60 * 60 * 24 * 7 * 4); //remove a sessão


$cookie = filter_input_array(INPUT_COOKIE,FILTER_SANITIZE_STRIPPED);

var_dump([
    $_COOKIE,
    $cookie,
]);

$time = time () + 60 * 60 * 24 * 7;

$user = [
    "user" => "Alexandre Duzentos",
    "password" => "12348",
    "time" => $time,
];

setcookie("fslogin", http_build_query($user), $time, "/");

$login = filter_input(INPUT_COOKIE, "fslogin", FILTER_SANITIZE_STRIPPED);

if($login){
    var_dump($login);
    var_dump($_COOKIE['fslogin']);
}

$arrLogin = [];
parse_str($login,$arrLogin);
var_dump($arrLogin);



/*
 * [ sessões ] http://php.net/manual/pt_BR/ref.session.php
 */
fullStackPHPClassSession("sessões", __LINE__);

$folder = __DIR__."/sesion_files";

if(!file_exists($folder) || !is_dir($folder)){
    mkdir($folder);
} else {
    echo "<p class='trigger accept'>Diretório já existe!</p>";
}

session_name("Viver");
session_id("3ufudurd83884d8jdi38d2jdiw");
session_save_path(__DIR__."/sesion_files");

/*Não posso fazer alterações na sessão abaixo da sua inicialização, apenas acima*/

session_start(["cookie_lifetime" => (60 * 60 * 24)]); // inicializa a sessão(a sessão está ativa)


var_dump([
    "conteúdo da sessão" => $_SESSION, 
    "id" => session_id(), //permite definir e retorna o id de sessão
    "name" => session_name(), //permite definir a retorna o nome de sessão
    "status" => session_status(),//retorna o status atual da sessão PHP_SESSION_DISABLE(0),PHP_SESSION_ACTIVE(2),PHP_SESSION_NONE(1)
    "save_path" => session_save_path(), //permite definir e retorna a caminho da pasta de salvamento das sessões
    "cookie" => session_get_cookie_params(),
]);

$_SESSION["login"] = (object)$user;
$_SESSION["Morada"] = ["País" => "Angola","Cidade" => "Luanda",'município' => "Talatona"];

//unset($_SESSION['login']); // Elimina um índice da sessão especificada;

//session_destroy(); // Elimina todas as sessões existentes.

var_dump([
    "sessão ativa" => PHP_SESSION_ACTIVE, // SESSÃO ATIVA E EXISTE PELO MENOS UMA
    "sessão nula" => PHP_SESSION_NONE, // SESSÃO ATIVA,MAS NULA
    "sessão desativada" => PHP_SESSION_DISABLED, // SESSÃO DESATIVADA
]);


