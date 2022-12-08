<?php

require_once __DIR__."/InterfaceLutador.php";

class Lutador implements InterfaceLutador
{
    
    private $nome;
    private $nacionalidade;
    private $idade;
    private $altura;
    private $peso;
    private $categoria;
    private $vitorias;
    private $derrotas;
    private $empates;
    
    public function __construct(String $nome,String $nacionalidade,float $idade, float $altura,float $peso,
    int $vitorias, int $derrotas,int $empates)
    
    {
        $this->setNome($nome);
        $this->setNacionalidade($nacionalidade);
        $this->setIdade($idade);
        $this->setAltura($altura);
        $this->setPeso($peso);
        $this->setVitorias($vitorias);
        $this->setDerrotas($derrotas);
        $this->setEmpates($empates);
       
    }
    
    public function getNome()
    {
       return $this->nome; 
    }
    
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    
    public function getNacionalidade()
    {
        return $this->nacionalidade;
        
    }
    
    public function setNacionalidade($nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;
    }
    
    public function getIdade(){
        return $this->idade;
    }
    
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }
    
    public function getAltura()
    {
        return $this->altura;
    }
    
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }
    
    public function getPeso()
    {
        return $this->peso;
    }
    
    public function setPeso($peso)
    {
        $this->peso = $peso;
        $this->setCategoria();
    }
    
    public function getVitorias()
    {
        return $this->vitorias;
    }
    
    public function setVitorias($vitorias)
    {
        $this->vitorias = $vitorias;
    }
    
    
    public function getDerrotas()
    {
        return $this->derrotas;
    }
    
    public function setDerrotas($derrotas)
    {
        $this->derrotas = $derrotas;
    }
    
    public function getEmpates()
    {
        return $this->empates;
    }
    
    public function setEmpates($empates)
    {
        $this->empates = $empates;
    }
    
    
    public function getCategoria()
    {
        return $this->categoria;
       
    }
    
    private function setCategoria()
    {
        if($this->peso < 52.2){
            $this->categoria = "Inválido";
        } else if($this->peso <= 70.3) {
            $this->categoria = "Leve";
        } else if($this->peso <= 83.9){
            $this->categoria = "Médio";
        } else if($this->peso <= 120.2){
            $this->categoria = "Pesado";
        } else {
            $this->categoria = "inválido";
        }
        
    }
   
    public function perderLuta()
    {
        $this->setDerrotas($this->getDerrotas() + 1);
    }

    public function empatarLuta()
    {
        $this->setEmpates($this->getEmpates() + 1);
    }

    public function apresentar()
    {
        echo "<p>-------------------------------------------</p>";
        echo "CHEGOU A HORA! O lutador : {$this->getNome()}</br>";
        echo "Veio directamente de : {$this->getNacionalidade()}</br>";
        echo " Tem {$this->getIdade()} anos de idade e pesa {$this->getPeso()} Kg e {$this->getAltura()} m de altura</br>";
        echo "Ele tem  {$this->getVitorias()} vitórias</br>";
        echo "{$this->getDerrotas()} derrotas e {$this->getEmpates()} empates!</br>";
        
    }

    public function status()
    {
        echo "<p>------------------------------------------</p> ";
        echo "<p>{$this->getNome()} é um peso {$this->getCategoria()} </p> ";
        echo "E já ganhou {$this->getVitorias()}  vezes e";
        echo "Empatou {$this->getEmpates()} vezes! ";
       
    }

    public function ganharLuta()
    {
        $this->setVitorias($this->getVitorias() + 1);
    }

}

