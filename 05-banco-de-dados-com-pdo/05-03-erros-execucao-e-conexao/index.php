<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.03 - Errors, conexão e execução");

/*
 * [ controle de erros ] http://php.net/manual/pt_BR/language.exceptions.php
 */
fullStackPHPClassSession("controle de erros", __LINE__);

// No bloco try é colocado o código que possívelmente pode lançar um exceção.
// O bloco catch é responsável por capturar a exceção lançada pelo código no bloco try.

//A classe que armazena as informações lançados pela exceção é a Exception, parametrizada dentro do catch

// finally é o bloco que é executado sempre, ao final da cadeia tratamento de exceções.

try{
    //throw new Exception("exception");
    throw new ErrorException("ErrorException");
    throw new PDOException("PDOException");
} catch(PDOException | ErrorException $exception){
        var_dump($exception);
} catch(Exception $exception){
    var_dump($exception);
} finally {
   echo "<p class=''trigger>A execução terminou</p>";
}


/*
 * [ php data object ] Uma classe PDO para manipulação de banco de dados.
 * http://php.net/manual/pt_BR/class.pdo.php
 */
fullStackPHPClassSession("php data object", __LINE__);

try{
    $pdo = new PDO(
        "mysql:host=localhost;dbname=fsphp;port=3306",
        "root",
        "",
        // Configurações que definem o comportamento do PDO com o Banco de dados
        [
            //Definindo o charset do PDO - o charset do PDO deve ser igual ao do banco de dados
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
        ]
    );

    $stmt = $pdo->query("SELECT * FROM users limit 3");
    while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
          var_dump($user);
    }

} catch(PDOException $exception) {
        var_dump($exception);
}


/*
 * [ conexão com singleton ] Conextar e obter um objeto PDO garantindo instância única.
 * http://br.phptherightway.com/pages/Design-Patterns.html
 */
fullStackPHPClassSession("conexão com singleton", __LINE__);

require __DIR__."/source/autoload.php";


use \Source\Database\Connection;

$pdo1 = Connection::getInstance();
$pdo2 = Connection::getInstance();

var_dump(
    $pdo1,
    $pdo2,
    Connection::getInstance()::getAvailableDrivers(), // Retorna os drivers dos SGBD disponíveis.
    Connection::getInstance()->getAttribute(PDO::ATTR_DRIVER_NAME) // Retorna o driver do SGBD em uso.
);



