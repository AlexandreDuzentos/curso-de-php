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

    /**
   * load : listagem de usuários pelo id + implementação de regra de negócio do usuário.
   * @param int $id
   * @param string $columns
   * @return null|userModel
   * 
  */
	public function load(int $id, string $columns = "*"): ?UserModel
	{
       $load = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE id = :id", "id={$id}");
       if($this->fail || !$load->rowCount()){
          $this->message = "Usuário não encontrado para o id informado!";
          return null;
       }
       
       // O método fetchObject retorna um objeto de uma classe específicada
       return $load->fetchObject(__CLASS__);

	}

    /**
   * find : listagem de usuários pelo email + implementação de regra de negócio do usuário.
   * @param string $email
   * @param string $columns
   * @return null|UserModel
   * 
  */
	public function find(string $email, string $columns = "*"): ?UserModel
	{
      $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE email = :email", "email={$email}");
       if($this->fail || !$find->rowCount()){
          $this->message = "Usuário não encontrado para o email informado!";
          return null;
       }
       
       // O método fetchObject retorna um objeto de uma classe específicada
       return $find->fetchObject(__CLASS__);

	}
   
    /**
   * all : listagem de todos os usuários com o limit e offset  + implementação de regra de negócio do usuário.
   * @param int $limit
   * @param int $offset
   * @param string $columns
   * @return null|array
   * 
  */
	public function all(int $limit = 5, int $offset = 6,string $columns = "*"): ?array
	{
       $all = $this->read("SELECT {$columns} FROM users LIMIT :l OFFSET :o", "l={$limit}&o={$offset}");
       if($this->fail || !$all->rowCount()){
          $this->message = "Sua consulta não retornou usuários!";
          return null;
       }

       return $all->fetchAll(PDO::FETCH_CLASS, __CLASS__);

       
	}
   
    /**
   * save : salvamento e atualização de usuário com o padrão active record + implementação de regra de negócio do usuário.
   * @return null|UserModel
   * 
  */
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
          $this->update(self::$entity, $this->filter($this->safe()), "id = :id", "id={$userId}");

          if($this->fail()) {
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

    /**
   * destroy: deleção de usuário com o padrão active record + implementação de regra de negócio do usuário.
   * @return null|UserModel
   * 
  */
	public function destroy()
	{
     if(!empty($this->id)) {
        $this->delete(self::$entity, "id = :id", "id={$this->id}");
     }

     if($this->fail()) {
        $this->message = "não foi possível remover o usuário!";
        return null;
     }  

     $this->message = "usuário removido com sucesso!";
     $this->data = null;
     return $this;

	}
   
    /**
   * required : valida se os campos estão vazios e validade e-mail + implementação de regra de negócio do usuário.
   * @return true|false
   * 
  */
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