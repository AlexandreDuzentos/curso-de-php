<?php


class Mamifero extends Animal
{
    private $corPelo;
    
    // override
    public function emitirSom()
    {
       echo "<p>Som de mamífero</p>"; 
    }

    public function locomover()
    {
        echo "<p>Correndo</p>";
    }
    
 
    // override
    public function Alimentar()
    {
        echo "<p>Mamando</p>";
    }

   
    public function getCorPelo()
    {
        return $this->corPelo;
    }
    
   
    public function setCorPelo($corPelo)
    {
        $this->corPelo = $corPelo;
    }
    
    
}

