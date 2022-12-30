<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.04 - Consultas com query e exec");

require __DIR__ ."/source/autoload.php";

use Source\Database\Connection;

/*
 * [ insert ] Cadastrar dados.
 * https://mariadb.com/kb/en/library/insert/
 *
 * [ PDO exec ] http://php.net/manual/pt_BR/pdo.exec.php
 * [ PDO query ]http://php.net/manual/pt_BR/pdo.query.php
 */
fullStackPHPClassSession("insert", __LINE__);

$insert = "insert into users(first_name, last_name, email, document)values
('Alexandre','Duzentos','AlexandreDuzentos33@gmail.com','23848593');";

//$query = "select * from users;"

try {
   // 
    /*
      o método exec é usado para executar comandos DML e DQL
       usamos o método exec para executar comandos de DQL quando queremos simplesmente consultar se um dado existe.
      a declaração insert usado dentro do método exec Retorna 1(dado inserido) ou 0(dado não inserido)
      a declaração select usada dentro de um método exec Retorna 1(dado achado) ou 0(dado não achado)
      o método exec é menos recursivo que o query
    */
   //$exec = Connection::getInstance()->exec($insert);  

   //o método lastInsertId retorna o último id inserido na tabela
   var_dump(Connection::getInstance()->lastInsertId());

   $exec = null;

   /*
     o método query retorna um objeto da classe PDOStatement
     o método query é usado para executar comandos DML E DQL
     o método query é mais recursivo que o método exec
   */ 
   $query = Connection::getInstance()->query($insert);  
   var_dump(Connection::getInstance()->lastInsertId());

   var_dump(
    get_class_methods($query),
    $query->errorInfo(),
);


} catch(PDOException $exception){
   var_dump($exception);
}


/*
 * [ select ] Ler/Consultar dados.
 * https://mariadb.com/kb/en/library/select/
 */
fullStackPHPClassSession("select", __LINE__);

$query = "select * from users limit 2;";

try {
    // o método query retorna um objeto da classe PDOStatement
    $query = Connection::getInstance()->query($query);

    var_dump([
       $query,
       $query->rowCount(),
        $query->fetchAll()
    ]);

} catch(PDOException $exception){
    var_dump($exception);
}


/*
 * [ update ] Atualizar dados.
 * https://mariadb.com/kb/en/library/update/
 */
fullStackPHPClassSession("update", __LINE__);

$update = "UPDATE USERS SET first_name = 'kaue', last_name = 'cardoso'
            WHERE id = '50';";

try{
     /*
      o método exec é usado para executar comandos DML e DQL
      usamos o método exec para executar comandos de DQL quando queremos simplesmente consultar se um dado existe
      o método exec é menos recursivo que o query
      a declaração select usada dentro de um método exec Retorna 1(dado achado) ou 0(dado não achado)
      o declaração update usada dentro do método exec retorna a quantidade de linhas afetadas
    */
    $exec = Connection::getInstance()->exec($update);
    var_dump($exec);

} catch(PDOException $exception){
    var_dump($exception);
}


/*
 * [ delete ] Deletar dados.
 * https://mariadb.com/kb/en/library/delete/
 */
fullStackPHPClassSession("delete", __LINE__);

$delete = "DELETE FROM users where id > 50";

try{
    /*
      o método exec é usado para executar comandos DML e DQL
      usamos o método exec para executar comandos de DQL quando queremos simplesmente consultar se um dado existe
      o método exec é menos recursivo que o query
      o declaração delete usada dentro do método exec retorna a quantidade de linhas afetadas
    */
   $exec = Connection::getInstance()->exec($delete);

   var_dump($exec);

} catch(PDOException $exception){
    var_dump($exception);
}