<?php

class Caneta
{
  public $modelo;
  public $cor;
  private $ponta;
  protected $carga;
  protected $tampada;
  
  public function escrever(){
      if($this->tampada || $this->carga < "30%"){
          echo "<p>Erro,não posso escrever, destampe a caneta ou troque de caneta!</p>";
      } else {
          echo "escrevendo...."; 
      }
  }
  
  public function rabiscar(){
      if($this->tampada == true){
          echo "<p>Erro, não posso rabiscar!</p>";
      } else {
          echo "<p>Rabiscando...</p>";
      }
  }
  
  public function pintar(){
      if($this->tampada || $this->ponta < 1 || $this->carga > "50%"){
          echo "<p>Erro, não posso pintar, destampe a caneta ou troque de caneta!</p>";
      } else {
          echo "<p>Pintando...</p>";
      }
  }
  
  public function tampar(){
      $this->tampada = true;
  }
  
  public function destampar(){
      $this->tampada = false;
      
  }
}

