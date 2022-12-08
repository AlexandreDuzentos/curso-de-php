<?php

class Professor extends Pessoa
{
    private $especialidade;
    private $salario;
    
    public function receberAum($aumento){
       $this->salario += $aumento; 
    }
    
    public function getEspecialidade(){
        return $this->especialidade;
    }
    
    public function setEspcialidade($especialidade){
        $this->especialidade = $especialidade;
    }
    
    public function getSalario(){
        return $this->salario;
    }
    
    public function setSalario($salario){
        $this->salario = $salario;
    }
}

