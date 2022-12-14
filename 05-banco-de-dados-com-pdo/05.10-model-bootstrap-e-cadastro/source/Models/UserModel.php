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

	public function bootstrap(string $first_name, string $last_name, string $email, string $document)
	{
       $this->first_name = $first_name;
       $this->last_name = $last_name;
       $this->email = $email;
       $this->document = $document;
       return $this;
	}

	public function load($id, $columns = "*"): ?UserModel
	{
       $load = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE id = :id", "id={$id}");
       if($this->fail || $load->rowCount()){
          $this->message = "Usuário não encontrado para o id informado!";
          return null;
       }
       
       // O método fetchObject retorna um objeto de uma classe específicada
       return $load->fetchObject(__CLASS__);

	}

	public function find($email, $columns = "*")
	{
      $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE email = :email", "email={$email}");
       if($this->fail || $find->rowCount()){
          $this->message = "Usuário não encontrado para o email informado!";
          return null;
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

	public function save(): ?userModel
	{
		// Elimina campos que não podem ser persistidos no banco de dados e valida-os
      /* $this->filter($this->safe()); */

      if(!$this->required()){
         return null;
      }
      
      /* Operação de atualização de dados do usuário */
      if(!empty($this->id)) {
          $userId = $this->id;
          $this->update(self::$entity, $this->safe(), "id = :id", "id={$this->id}");
          if($this->fail()){
            $this->message = "Erro ao atualizar, verifque os dados!";
            return null;
          }
          $this->message = "Atualização realizada com sucesso!";
      }
       
      /* Operação de inserção de dados do usuário */
      if(empty($this->id)) {
         if($this->find($this->email)) {
            var_dump("Email já cadastrado");
         	 $this->message = "O e-mail informado já está cadastrado!";
         	 return null;
         }

         $userId = $this->create(self::$entity, $this->safe());
         if($this->fail()) {
            $this->message = "Erro ao cadastrar, verifique os dados!";
            return null;
         }
         $this->message = "cadastro realizado com sucesso";

      }
      
      $this->data = $this->read("SELECT * FROM users WHERE id = :id;","id={$userId}")->fetch();
      return $this;

	}

	public function destroy()
	{
  
	}

	public function required(): bool
	{
		if(empty($this->first_name) || empty($this->last_name) || empty($this->email)) {
          $this->message = "Nome, sobrenome e e-mail são campos obrigatórios";
          return false;
      }

      if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
         $this->message = "O e-mail informado não parece válido!";
         return false;
      }

      return true;
	}

}

?>