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

   public function update(string $entity, array $data, string $terms, string $params)
   {
     try {
         $dataSet = [];
         foreach($data as $key => $value){
            $dataSet[] = "{$key} = :{key}";
         }

         $dataSet = implode(", ", $dataSet);
         parse_str($params, $params);

         $stmt = Connection::getInstance("UPDATE {$entity} SET {$dataSet} WHERE {$terms}");
         var_dump($data);
         //$stmt->execute($this->filter(array_merge($data, $params)));
         return ($stmt->rowCount() ?? 1);
     }catch(PDOException $exception){
           $this->fail = $exception;
           return null;
     }
  	
   }

   public function delete()
  {
  	
  }

  /*
   Os campos created_at, updated_at e id não podem ser atualizados e nem cadastrados
   em uma rotina de persistência(escrita no banco de dados) por serem autogerenciáveis

   o método safe irá eliminar os campos que não podem ser persistidos no banco de dados
  */ 

   protected function safe(): ?array
   {
      $safe = (array)$this->data;

      foreach(static::$safe as $unset){
            unset($safe[$unset]);
      }
      return $safe;

   }

   // o método filter validará os dados que podem ser persistidos na base de dados
   protected function filter(array $data)
   {
     $filter = [];
     foreach($data as $key => $value){
           $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS)); 
      }
      return $filter;
   }


}

?>