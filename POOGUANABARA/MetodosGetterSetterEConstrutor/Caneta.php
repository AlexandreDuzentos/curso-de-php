<?php

class Caneta
{
    private $modelo;
    private $ponta;
    private $tampada;
    
    public function __construct($modelo,$cor,$ponta){ //Método construtor
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->ponta = $ponta;
        $this->tampar();
    }
    
    public function tampar(){
        $this->tampada = true;
    }
    
    public function getModelo(){
        return $this->modelo;
    }
    
    public function setModelo(String $modelo){
        $this->modelo = $modelo;
    }
    
    public function getPonta(){
        return $this->ponta;
    }
    
    public function setPonta(float $ponta){
        $this->ponta = $ponta;
    }
}

