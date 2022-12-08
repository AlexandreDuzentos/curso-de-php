<?php

require_once __DIR__."/InterfaceLuta.php";
class Luta implements InterfaceLuta
{
    private  $desafiado;
    private $desafiante;
    private $rounds;
    private $aprovada;
    
    public function __construct(){
        
    }
    
    public function setDesafiado(Lutador $desafiado){
        $this->desafiado = $desafiado;
    }
    
    public function getDesafiado(){
        return $this->desafiado;
    }
    
    public function setDesafiante(Lutador $desafiante){
        $this->desafiante = $desafiante;
    }
    
    public function getDesafiante(){
        return $this->desafiante;
    }
    
    public function getRounds(){
        return $this->rounds;
    }
    
    public function setRounds($rounds){
        $this->rounds = $rounds;
    }
    
    public function getAprovada(){
        return $this->aprovada;
    }
    
    public function setAprovada($aprovado){
        $this->aprovada = $aprovado;
    }
   
    public function marcarLuta(Lutador $l1,Lutador $l2)
    {
        if($l1->getCategoria() == $l2->getCategoria() && $l1 != $l2 ){   
           $this->setAprovada(true);
           $this->desafiado = $l1;
           $this->desafiante = $l2;
        } else {
            $this->setAprovada(false);
            $this->desafiado = null;
            $this->desafiante = null;
        }
    }
    
    public function lutar()
    {
        if($this->getAprovada() == true){
            $this->desafiado->apresentar();
            $this->desafiante->apresentar();
            $vencedor = rand(0,2);
            switch($vencedor){
                case 0: //empatou
                    echo "Empatou !";
                     $this->getDesafiado->empatarLuta();
                     $this->getDesafiante->empatarLuta();
                    break;
                case 1: // ganhou desafiado
                    echo "{$this->getDesafiado()->getNome()} ganhou!";
                    $this->getDesafiado()->ganharLuta();
                    $this->getDesafiante()->perderLuta();
                    break;
                case 2: // ganhou desafiante
                    echo "{$this->getDesafiante()->getNome()} ganhou!";
                    $this->getDesafiante()->ganharLuta();
                    $this->getDesafiado()->perderLuta();
                    break;
            }
        } else {
            echo "<p>Luta não pode acontecer!</p>";
        }
    }
    

    
   
}

