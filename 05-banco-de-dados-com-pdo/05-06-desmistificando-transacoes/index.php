<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.06 - Desmistificando transações");

require __DIR__ ."/source/autoload.php";

use Source\Database\Connection;

/*
 * [ transaction ] https://pt.wikipedia.org/wiki/Transa%C3%A7%C3%A3o_em_base_de_dados
 *
 * [ Atomicidade ] Resumo: Todas as ações que compõem a unidade de trabalho da transação
 * devem ser concluídas com sucesso, para que seja efetivada.
 *
 * [ Consistência ] Resumo: Todas as regras e restrições definidas no banco de dados devem
 * ser obedecidas. (relacionamentos, tipos, restrições, etc.)
 *
 * [ Isolamento ] Resumo: Cada transação funciona completamente à parte de outras estações e
 * todas as operações são parte de uma transação única.
 *
 * [ Durabilidade ] Resumo: Os efeitos de uma transação em caso de sucesso (commit) devem
 * persistir no banco de dados (Uma transação só tem sentido se houver gravação)
 */
fullStackPHPClassSession("transaction", __LINE__);


try{
    $pdo = Connection::getInstance();
    $pdo->beginTransaction();

    $pdo->query("INSERT INTO users (first_name, last_name, email, document)
        values('Alexandre','Duzentos','Aduzentos12@gmail.com','233585653');");

    $userId = $pdo->lastInsertId();

    $pdo->query("INSERT INTO users_address(user_id, street, number, complement)
        values($userId, 'Rua da up','3999','sala 210');");

    $pdo->commit();

} catch(PDOException $exception){
    $pdo->rollback();
      var_dump($exception);
}
