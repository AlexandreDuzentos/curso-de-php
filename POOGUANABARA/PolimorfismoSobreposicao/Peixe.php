<?php


class Peixe extends Animal
{
    private $corEscama;
    

    public function soltarBolha(){
       echo "<p>Soltou uma bolha</p>"; 
    }
    
    public function emitirSom()
    {
        echo "<p>Peixe não faz som</p>";
    }

    public function locomover()
    {
        echo "<p>Nadando</p>";
    }

    public function Alimentar()
    {
        echo "<p>Comendo substâncias</p>";
    }
    
    
    public function getCorEscama()
    {
        return $this->corEscama;
    }
    
    
    public function setCorEscama($corEscama)
    {
        $this->corEscama = $corEscama;
    }

}

