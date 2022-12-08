<?php


class Gafanhoto extends Pessoa
{
    private $login;
    private $totAssistindo;

    public function __construct($nome, $idade, $sexo, $login){
        Parent::__Construct($nome,$idade,$sexo); // Chamando o construtor da superclasse
        $this->login = $login;
        $this->totAssistindo = 0;
    }
    
    public function viuMaisUm(){
        $this->totAssistindo++;
    }
    
    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }
    
    
    public function getTotAssistindo()
    {
        return $this->totAssistindo;
    }
    
   
    public function setLogin($login)
    {
        $this->login = $login;
    }
    
   
    public function setTotAssistindo($totAssistindo)
    {
        $this->totAssistindo = $totAssistindo;
    }
    
    
}

