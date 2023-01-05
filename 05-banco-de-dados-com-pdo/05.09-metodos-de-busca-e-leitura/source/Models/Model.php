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

  public function create()
  {

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

   public function update()
  {
  	
  }

   public function delete()
  {
  	
  }

  /*
   Os campos created_at, updated_at e id não podem ser atualizados e nem cadastrados
   em uma rotina de persistência(escrita no banco de dados) por serem autogerenciáveis
  */ 

   protected function safe(): ?array
   {

   }


}

?>