<?php

namespace Source\Models;

abstract class Model
{
  /* @var object(stdClass)|null */
  protected $data; // guardará todos os dados da classe

  /* @var PDOException */
  protected $fail; // guardará mensagens de erro

  /* @var string|null */
  protected $message; // guardará outras mensagens para o usuário


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

   public function read()
  {
  	
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