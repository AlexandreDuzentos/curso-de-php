<?php

namespace Source\Models;

use \Source\Database\Connection;
use \stdClass;
use \PDOStatement;
use \PDOException;
use \PDO;

abstract class Model
{
  /* @var object(stdClass)|null */
  protected $data; // guardará todos os dados da classe

  /* @var PDOException */
  protected $fail; // guardará mensagens de erro

  /* @var string|null */
  protected $message; // guardará outras mensagens para o usuário

  public function __set($name, $value)
  {
    if(empty($this->data))
    {
       $this->data = new stdClass();
    }

    $this->data->$name = $value;

  }

  public function __isset($name)
  {
     return isset($this->data->$name);
  }

  public function __get($name)
  {
    return ($this->data->$name ?? null);
  }


  public function  data(): ?object
  {
  	return $this->data;
  }

  public function fail(): ?\PDOException
  {
  	return $this->fail;
  }

  public function message(): ?string
  {
  	return $this->message;
  }

  /**
   * create : cadastro de usuários(apenas a persistência), sem implementação de regra de negócio do usuário.
   * @param string $entity
   * @param array $data
   * @return null|int
   * 
  */
  public function create(string $entity, array $data): ?int
  {
    // converte um array para string, com o separador dos elementos passado no primeiro parâmetro
    $columns = implode(", ", array_keys($data));
    $values = ":". implode(", :", array_keys($data));

    try {
        $stmt = Connection::getInstance()->prepare("INSERT INTO {$entity} ($columns)VALUES($values)");
        $stmt->execute($this->filter($data));

        return Connection::getInstance()->lastInsertId();

    } catch(PDOException $exception){
          $this->fail = $exception;
          return null;
    }
    var_dump($entity, $data);
  }

   /**
   * read : listagem de usuários(apenas o acesso aos registros), sem implementação da regra de negócio do usuário
   * @param string $select
   * @param string $params
   * @return null|PDOStatement
   * 
  */
   public function read(string $select, string $params = null): ?PDOStatement
  {
  	 try {
        $stmt = Connection::getInstance()->prepare($select);

        if($params){ 
           parse_str($params, $paramsArray);
           foreach($paramsArray as $field => $value){
               //$pdoDataType = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
               $stmt->bindValue(":{$field}", (int)$value, PDO::PARAM_INT);
            }

           }
           
           $stmt->execute();
           return $stmt;

     } catch(PDOException $exception){
        $this->fail = $exception;
        return null;
     }
  }
   
   /**
   * update : Atualização de usuários(apenas a persistência), sem a implementação da regra de negócio do usuário.
   * @param string $entity
   * @param array $data
   * @param string $terms
   * @param string  $params
   * @return null|int
   * 
  */
   public function update(string $entity, array $data, string $terms, string $params): ?int
   {
     try {
         $dataSet = [];
         foreach($data as $key => $value){
            $dataSet[] = "{$key} = :{$key}";
         }

         $dataSet = implode(", ", $dataSet);
         parse_str($params, $params);

         echo "UPDATE {$entity} SET {$dataSet} WHERE {$terms}";

         $stmt = Connection::getInstance()->prepare("UPDATE {$entity} SET {$dataSet} WHERE {$terms}");
         $stmt->execute($this->filter(array_merge($data, $params)));
         return ($stmt->rowCount() ?? 1);
     }catch(PDOException $exception){
           $this->fail = $exception;
           return null;
     }
  	
   }
   
   /**
   * delete : Deleção de usuários(apenas a remoção), sem a implementação da regra de negócio do usuário.
   * @param string $entity
   * @param string $terms
   * @param string $params
   * @return null|int
   * 
  */
   public function delete(string $entity, string $terms, string $params): ?int
  {
    try {
       $stmt = Connection::getInstance()->prepare("DELETE FROM {$entity} WHERE $terms");
       parse_str($params, $params);
       $stmt->execute($params);
       return ($stmt->rowCount() ?? 1);
    } catch(PDOException $exception) {
           $this->fail = $exception;
           return null;
    }
  }

  
   /**
   * safe : Os campos created_at, updated_at e id não podem ser atualizados e nem cadastrados
     em uma rotina de persistência(escrita no banco de dados) por serem autogerenciáveis.
     o método safe irá eliminar os campos que não podem ser persistidos no banco de dados.

   * @return null|array
   * 
  */
   protected function safe(): ?array
   {
      $safe = (array)$this->data;

      foreach(static::$safe as $unset){
            unset($safe[$unset]);
      }
      return $safe;

   }

   /**
   * filter : filtra caracteres especiais dos valores dos campos que serão persistidos na base de dados
   * (first_name, last_name,email, document)
   * 
   * @param array $data
   * @return null|array
   * 
  */
   protected function filter(array $data): ?array
   {
     $filter = [];
     foreach($data as $key => $value){
           $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS)); 
      }
      return $filter;
   }


}

?>