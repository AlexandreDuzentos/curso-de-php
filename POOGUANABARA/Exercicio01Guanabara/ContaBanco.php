<?php

class ContaBanco
{
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;
    
    public function __construct(){
        $this->setSaldo(0);
        $this->setStatus(false);
    }
    
    public function abrirConta($t){
        $this->setTipo($t);
        $this->setStatus(true);
        if($t == "cc"){
            $this->saldo = 50;
        } else {
            $this->saldo = 150;
        }
    }
    
    public function fecharConta(){
        if($this->saldo > 0){
            echo "<p>Conta com dinheiro<p>";
        } else if($this->saldo < 0){
            echo "<p>Conta com débito</p>";
        } else {
            $this->setStatus(false);
            echo "<p>Conta de {$this->getDono()} fechada com sucesso!</p>";
        }
    }
    
    public function depositar($quantia){
        if($this->status == true){
           $this->setSaldo($this->getSaldo() + $quantia);
           //$this->saldo += $quantia;
        } else {
            echo "<p>Conta fechada, não consigo depositar!</p>";
        }
    }
    
    public function sacar($quantia){
        if($this->getStatus() == true){
            $this->setSaldo($this->getSaldo() - $quantia);
            echo "<p>saque de {$quantia} autorizado na conta de {$this->getDono()}</p>";
            //$this->saldo -= $quantia;
        } else {
            echo "<p>Conta fechada, não consigo sacar!</p>";
        }
    }
    
    public function pagarMensal(){
      $quantia = 0;
      if($this->getTipo() == "cc"){
          $quantia = 12;
      } else if($this->getTipo() == "cp"){
          $quantia = 20;
      }
      
      if($this->getStatus() == true){
          if($this->getSaldo() > $quantia){
              $this->saldo -= $quantia;
              echo "<p>Mensalidade de  R$ {$quantia} debitada na conta de {$this->getDono()}</p>";
          } else {
              echo "<p>Saldo insuficiente!</p>";
          }
      } else {
          echo "<p>Impossível pagar!</p>";
      }
    }
    
    public function getNumConta(){
        return $this->numConta;
    }
    
    public function setNumConta($numConta){
        $this->numConta = $numConta;
    }
    
    public function getTipo(){
        return $this->tipo;
    }
    
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    
    public function getDono(){
        return $this->dono;
    }
    
    public function setDono($dono){
        $this->dono = $dono;
    }
    
    public function getSaldo(){
        return $this->saldo;
    }
    
    public function setSaldo($saldo){
        $this->saldo = $saldo;
    }
    
    public function getStatus(){
        return $this->saldo;
    }
    
    public function setStatus($status){
        $this->status = $status;
    }
    
  
}
