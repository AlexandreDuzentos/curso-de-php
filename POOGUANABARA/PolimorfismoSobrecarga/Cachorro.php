<?php


class Cachorro extends Lobo
{
    public function emitirSom(){
        echo "<p>Au!Au!Au!</p>";
    }
   
  
    
    public function reagirFrase(String $frase){
        if($frase == "toma comida" || $frase == "olá") {
            echo "<p>Abanar e latir</p>";
        } else {
            echo "<p>Rosnar</p>";
        }
    }
    
    
    public function reagirHorario(int $horario){
        if($horario < 12){
            echo "<p>Abanar</p>";
        } else if($horario >= 18){
            echo "<p>Ignorar</p>";
        } else {
            echo "<p>Abanar e latir</p>";
        }
    }
    
    
    public function reagirDono(bool $dono){
        if($dono == true){
            echo "<p>Abanar </p>";
        } else {
            echo "<p>Rosnar e Latir</p>";
        }
    }
    
    
    public function reagirIdadePeso(int $idade,float $peso){
        if($idade < 5){
            if($peso < 10){
                echo "<p>Abanar</p>";
            } else {
                echo "<p>Latir</p>";
            }
        } else {
            if($peso < 10){
                echo "<p>Rosnar</p>";
            } else {
                echo "<p>ignorar</p>";
            }
  
}

    
    
    
    }
}

