<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.07 - PDOStatement e bind modes");

require __DIR__ . "/source/autoload.php";

use Source\Database\Connection;

/**
 * [ prepare ] http://php.net/manual/pt_BR/pdo.prepare.php
 */
fullStackPHPClassSession("prepared statement", __LINE__);

/*
o sql injection ocorre quando o usuário tem interação com a query
o or 1 = 1 é uma técnica para fazer sql injection
$pdoStatement = $pdo->prepare("SELECT * FROM users where id = 10 or 1 = 1");
*/
$pdo = Connection::getInstance();
$pdoStatement = $pdo->prepare("SELECT * FROM users LIMIT 9");
$pdoStatement->execute();


var_dump(
   $pdoStatement->rowCount(),
   $pdoStatement->columnCount(),
   $pdoStatement->fetch(),
);


/*
 * [ bind value ] http://php.net/manual/pt_BR/pdostatement.bindvalue.php
 *
 */
fullStackPHPClassSession("stmt bind value", __LINE__);

// o ? representa um link anónimo, é um parâmetro para a passagem de um valor
$stmt = Connection::getInstance()->prepare(
    "INSERT INTO users (first_name, last_name)values(?, ?);"
);

$stmt->bindValue(1, "Alexandre", PDO::PARAM_STR);
$stmt->bindValue(2, "Duzentos", PDO::PARAM_STR);

$stmt->execute();

var_dump(
    $stmt->rowCount(), // retorna 0 para registro não inserido e 1 para registro inserido
    Connection::getInstance()->lastInsertId()
);


/*
 o :nome representa um link nomeado ou de referência, é um parâmetro para a passagem de
 um valor, é preferível trabalhar dessa forma.
*/

 $stmt = Connection::getInstance()->prepare("INSERT INTO users (first_name, last_name)values(:first_name, :last_name);");

$stmt->bindValue(":first_name","Américo", PDO::PARAM_STR);
$stmt->bindValue(":last_name","dos santos", PDO::PARAM_STR);

$stmt->execute();

var_dump(
    $stmt->rowCount(), // retorna 0 para registro não inserido e 1 para registro inserido
);


/*
 * [ bind param ] http://php.net/manual/pt_BR/pdostatement.bindparam.php
 */
fullStackPHPClassSession("stmt bind param", __LINE__);

/*
  A diferença entre o bindValue e o bindParam é a passagem do valor do parâmetro
  enquanto que no bindValue, o valor do parâmetro é passado de forma literal, no bindParam o valor do
  parâmetro é passado por meio de uma variável, ou seja precisa ser uma referência e um valor literal
  não possui uma referência na memória
*/

// o ? representa um link anónimo, é um parâmetro para a passagem de um valor
$stmt = Connection::getInstance()->prepare(
    "INSERT INTO users (first_name, last_name)values(?, ?);"
);

$first_name = "João";
$last_name = "Duzentos";

$stmt->bindValue(1, $first_name, PDO::PARAM_STR);
$stmt->bindValue(2, $last_name, PDO::PARAM_STR);

$stmt->execute();

var_dump(
    $stmt->rowCount(), // retorna 0 para registro não inserido e 1 para registro inserido
    Connection::getInstance()->lastInsertId()
);


/*
 o :nome representa um link nomeado ou de referência, é um parâmetro para a passagem de
 um valor, é preferível trabalhar dessa forma.
*/

 $stmt = Connection::getInstance()->prepare("INSERT INTO users (first_name, last_name)values(:first_name, :last_name);");

 $first_name = "Amélia";
 $last_name = "Durango";

$stmt->bindValue(":first_name",$first_name, PDO::PARAM_STR);
$stmt->bindValue(":last_name",$last_name, PDO::PARAM_STR);

$stmt->execute();

var_dump(
    $stmt->rowCount(), // retorna 0 para registro não inserido e 1 para registro inserido
);


/*
 * [ execute ] http://php.net/manual/pt_BR/pdostatement.execute.php
 */
fullStackPHPClassSession("stmt execute array", __LINE__);

/*
  no método execute array com links de referência, os links de referência e os valores
  são passados em um array associativo
*/
$stmt = Connection::getInstance()->prepare("INSERT INTO users(first_name, last_name)
    values(:first_name, :last_name);");

$user = [
    "first_name" => "Paulo",
    "last_name" => "Massaki"
];

$stmt->execute($user);

var_dump(
    $stmt->rowCount()
);

 echo "-------------------------------------------------------------";

/*
  no método execute array com links de referência, os links de referência e os valores
  são passados em um array associativo
*/
$stmt = Connection::getInstance()->prepare("INSERT INTO users(first_name, last_name)
    values(?, ?);");

$user = [
    "Magno",
    "Pedro"
];

$stmt->execute($user);

var_dump(
    $stmt->rowCount()
);

/*
 * [ bind column ] http://php.net/manual/en/pdostatement.bindcolumn.php
 */
fullStackPHPClassSession("bind column", __LINE__);

$pdo = Connection::getInstance()->prepare("SELECT * FROM users LIMIT 2");

/*
 o método bindColumn faz com que um o valor de um atributo na tabela aponte para uma variável
*/
$pdo->bindColumn("first_name", $nome);
$pdo->bindColumn("email", $email);

$pdo->execute();

/* o uso do foreach com o bindColumn não surte o efeito desejado, ou seja os dados permanecem os mesmos
para cada iteraçao do foreach, para solucionar isso usamos o while
*/

/*
foreach($pdo->fetchAll() as $user){
     var_dump($user);
     echo "<p>o e-mail de {$nome} é {$email}</p>";
}
*/

echo "-----------------------------------------------------";

/* O uso do método fetch dentro do while,busca por um nextRowSet na tabela ou seja uma por um próximo conjunto de linhas(registros)
*/
while($user = $pdo->fetch()){
    var_dump($user);
    echo "<p>o e-mail de {$nome} é {$email}</p>";
}

