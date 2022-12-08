<?php


class Aluno extends Pessoa
{
    private $matricula;
    private $curso;
    
    public function pagarMensalidade(){
        echo "<p>Pagando mensalidade de {$this->getNome()}</p>";
    }
    
    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }
    
    public function getMatricula(){
        return $this->matricula;
    }
    
    public function setCurso($curso){
        $this->curso = $curso;
    }
    
}

