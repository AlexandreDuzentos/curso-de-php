<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.05 - Explorando estilos de busca");

require __DIR__ ."/source/autoload.php";

use Source\Database\Connection;
//use Source\Database\Entity\UserEntity;

/*
 * [ fetch ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch", __LINE__);

$query = Connection::getInstance();
$read = $query->query("SELECT * FROM users LIMIT 3");

/*
 as queries em PDO ficam armazenadas em buffer e, por conta disso, após o comando que puxa os dados do buffer ter sido executado, o buffer fica vazio,
 pois ele armazena dados apenas enquanto eles estão sendo movidos de um local par o outro, no caso do buffer para uma variável ou para imprimir na tela

 Uma vez que um resultado é aberto com o método fetch, ele já não existe
*/
if(!$read->rowCount()){
   echo "<p class='trigger warning'>Não obteve resultados!</p>";
} else {
    /* var_dump($read->fetch()); o método fetch retorna um único registro */

    /*  o método fetch usado dentro de um while retorna todos os registros */
    while($user = $read->fetch()){
         var_dump($user);
    }


}


/*
 * [ fetch all ] http://php.net/manual/pt_BR/pdostatement.fetchall.php
 */
fullStackPHPClassSession("fetch all", __LINE__);

$read = $query->query("SELECT * FROM users limit 3,2");

foreach($read->fetchAll() as $user){
    var_dump($user);
}

//Uma vez que um resultado é aberto com o método fetchAll, ele já não existe
var_dump($read->fetchAll());

/*
 * [ fetch save ] Realziar um fetch diretamente em um PDOStatement resulta em um clear no buffer da consulta. Você
 * pode armazenar esse resultado em uma variável para manipilar e exibir posteriormente.
 */
fullStackPHPClassSession("fetch save", __LINE__);

$read = $query->query("SELECT * FROM users LIMIT 5,1");
$result = $read->fetchAll();

var_dump(
    $read->fetchAll(),
    $result,
    $result
);


/*
 * [ fetch modes ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch styles", __LINE__);

$read = $query->query("SELECT * FROM users LIMIT 1");

/*
  ESTILOS DE BUSCA DE REGISTROS
  1 - PDO::FETCH_ASSOC(array associativo)
  2 - PDO::FETCH_OBJ(objeto stdclass)
  3 - PDO::FETCH_NUM(array indexado) não recomendável
  4 - PDO::FETCH_CLASS(objeto de uma classe específica)
*/

$read = $query->query("SELECT * FROM users LIMIT 1");
foreach($read->fetchAll(PDO::FETCH_ASSOC) as $user) {
    var_dump($user,$user['first_name']);
}

echo "-------------------------------------------";

$read = $query->query("SELECT * FROM users LIMIT 1");
foreach($read->fetchAll(PDO::FETCH_OBJ) as $user) {
    var_dump($user,$user->first_name);
}

echo "-------------------------------------------";


$read = $query->query("SELECT * FROM users LIMIT 1");
foreach($read->fetchAll(PDO::FETCH_NUM) as $user) {
    var_dump($user,$user[1]);
}

echo "-------------------------------------------";

$read = $query->query("SELECT * FROM users LIMIT 1");
foreach($read->fetchAll(PDO::FETCH_CLASS, \Source\Database\Entity\UserEntity::class) as $user) {
    var_dump($user,$user->getFirstName());
}


