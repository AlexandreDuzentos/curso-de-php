<?php


abstract class Pessoa
{
    protected $nome, $idade,$sexo,$experiencia;
    
    public function __construct($nome, $idade, $sexo){
        $this->nome = $nome;
        $this->idade = $idade;
        $this->sexo = $sexo;
        $this->experiencia = 0;
    }
    
    public function ganharExperiencia($n){
        $this->experiencia += $n;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getIdade(){
        return $this->idade;
    }
    
    public function setIdade($idade){
        $this->nome = $idade;
    }
    
    public function getSexo(){
        return $this->sexo;
    }
    
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    
    public function getExperiencia(){
        return $this->experiencia;
    }
    
    public function setExperiencia($experiencia){
        $this->experiencia = $experiencia;
    }
    
    
    
}

