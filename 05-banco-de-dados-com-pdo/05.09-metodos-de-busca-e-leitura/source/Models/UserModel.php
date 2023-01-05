<?php

namespace Source\Models;
use \Source\Models\Model;
use \PDO;

class UserModel extends ModeL
{
    /* @var array $safe no update or delete */
	protected static $safe = ["id","created_at","updated_at"];

    /* @var string $entity */
	protected static $entity = "users";

	public function bootstrap()
	{
      
	}

	public function load($id, $columns = "*"): ?UserModel
	{
       $load = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE id = :id", "id={$id}");
       if($this->fail || $load->rowCount()){
          $this->message = "Usuário não encontrado para o id informado!";
       }
       
       // O método fetchObject retorna um objeto de uma classe específicada
       return $load->fetchObject(__CLASS__);

	}

	public function find($email, $columns = "*")
	{
      $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE email = :email", "email={$email}");
       if($this->fail || $find->rowCount()){
          $this->message = "Usuário não encontrado para o email informado!";
       }
       
       // O método fetchObject retorna um objeto de uma classe específicada
       return $find->fetchObject(__CLASS__);

	}

	public function all(int $limit = 5, int $offset = 6,string $columns = "*"): ?array
	{
       $all = $this->read("SELECT {$columns} FROM users LIMIT :l OFFSET :o", "l={$limit}&o={$offset}");
       if($this->fail || !$all->rowCount()){
          $this->message = "Sua consulta não retornou usuários!";
          return null;
       }

       return $all->fetchAll(PDO::FETCH_CLASS, __CLASS__);

       
	}

	public function save()
	{

	}

	public function destroy()
	{

	}

	public function required()
	{
		
	}

}

?>