<?php


class Ave extends Animal
{
    private $corPena;
    
    public function emitirSom()
    {
       echo "<p>Som de áve</p>"; 
    }

    public function locomover()
    {
        echo "<p>Voando...</p>";
    }

    public function Alimentar()
    {
        echo "<p>Comendo frutas e arroz</p>";
    }
    
    public function fazerNinho()
    {
        echo "<p>Construiu um ninho</p>";
    }
    
   
    public function getCorPena()
    {
        return $this->corPena;
    }
    
    
    public function setCorPena($corPena)
    {
        $this->corPena = $corPena;
    }
    

    
}

