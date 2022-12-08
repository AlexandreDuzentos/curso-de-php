<?php

require __DIR__."/Controlador.php";

class ControleRemoto implements Controlador
{
    
    private $volume;
    private $ligado;
    private $tocando;
    
    //Métodos especiais
    public function __construct(){
        $this->setVolume(100);
        $this->setLigado(false);
        $this->setTocando(false);
    }
    
    private function setVolume($volume){
        $this->volume = $volume;
    }
    
    private function getVolume(){
        return $this->volume;
    }
    
    private function setLigado($ligado){
        $this->ligado = $ligado;
    }
    
    private function getLigado(){
        return $this->ligado;
    }
   
    
    private function setTocando($tocando){
        $this->tocando = $tocando;
    }
    
    private function getTocando(){
        return $this->tocando;
    }
    
    
    public function play()
    {
        if($this->getLigado() == true && !$this->getTocando()){
            $this->setTocando(true);
        }
    }
    
    public function pause()
    {
        if($this->getLigado() == true && $this->getTocando == true){
            $this->setTocando(false);
        }
    }
    
    public function ligar()
    {
        $this->setLigado(true);
    }

    public function desligar()
    {
        $this->setLigado(false);
    }

    public function maisVolume()
    {
        if($this->getLigado() == true){
            $this->setVolume($this->getVolume() + 5);
        } else {
            echo "<p>ERRO! não posso aumentar o volume.</p>";
        }
    }
    
    public function menosVolume()
    {
        if($this->getLigado() == true && $this->getVolume() > 0){
            $this->setVolume($this->getVolume() - 3);
        } else {
            echo "<p>ERRO! não posso diminuir o volume</p>";
        }
    }

    public function ligarMudo()
    {
        if($this->getLigado() == true && $this->getVolume() > 0){
            $this->setVolume(0);
        } else {
            echo "<p>ERRO! não posso ligar o mudo</p>";
        }
    }
    
    public function desligarMudo()
    {
        if($this->getLigado() == true && $this->getVolume() == 0){
            $this->setVolume(50);
        } else {
            echo "<p>ERRO! não posso ligar o mudo</p>";
        }
    }
    
    public function abrirMenu()
    {
        $volume = "";
        echo "<p>Está ligado ". ($this->getLigado() == true ? "sim" : "não"). " </p>";
        echo "<p>Está tocando ". ($this->getTocando() == true ? "sim" : "não"). " </p>";
        
        for($i = 0; $i < $this->getVolume(); $i += 10){
            $volume .=  "|";
        }
        
        echo $this->getVolume(). " {$volume}";
        
    }
    

    public function fecharMenu()
    {
        echo "<p>Fechando menu...</p>";
    }

   

}

