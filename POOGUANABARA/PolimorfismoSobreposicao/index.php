<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf8">
  <title>EXERCÍCIO - POLIMORFISMO</title>
</head>
<body>
  <?php 
     require_once __DIR__."/Animal.php";
     require_once __DIR__."/Mamifero.php";
     require_once __DIR__."/Reptil.php";
     require_once __DIR__."/Peixe.php";
     require_once __DIR__."/Ave.php";
     
     require_once __DIR__."/Canguru.php";
     require_once __DIR__."/Cachorro.php";
     
     //$an = new Animal();
     $m = new Mamifero();
     $r = new Reptil();
     $p = new Peixe();
     $a = new Ave();
     
     echo "-------------------Mamífero--------------------";
     
     //Mamífero
     $m->setPeso(70);
     $m->setIdade(4);
     $m->setCorPelo("Castanho");
     $m->setMembros(4);
     $m->locomover(); // Correndo
     $m->Alimentar(); // Mamando
     $m->emitirSom(); // Som de mamífero
     
     echo "-------------------Reptíl--------------------";
     
     
     //Réptil
     $r->setCorEscama("Cinzenta");
     $r->setIdade("5 meses");
     $r->setMembros(2);
     $r->setPeso("120 gramas");
     $r->locomover(); // rastejando
     $r->Alimentar(); // Comendo vegetais
     $r->emitirSom(); // Som de réptil
     
     echo "-------------------Peixe--------------------";
     
     //Peixe
     $p->setCorEscama("Cinzenta");
     $p->setIdade("5 meses");
     $p->setMembros(2);
     $p->setPeso("120 gramas");
     $p->locomover(); // Nadando
     $p->Alimentar();// Comendo substâncias 
     $p->emitirSom(); // Peixe não faz som
     $p->soltarBolha(); // soltou bolha
    
     echo "-------------------Áve--------------------";
     
     //Áve
     $a->setIdade("2 meses");
     $a->setMembros(4);
     $a->setPeso("80 gramas");
     $a->setCorPena("Verde");
     $a->locomover(); // Voando
     $a->Alimentar(); //Comendo frutas e arroz
     $a->emitirSom(); // Som de áve
     $a->fazerNinho(); // Construiu um ninho
     
     
     // PRÓXIMO NÍVEL DE HERANÇA
     
     echo "<p>-------------- PRÓXIMO NÍVEL DE HERANÇA----------------</p>";
     
     $m = new Mamifero();
     $c = new Canguru();
     $k = new Cachorro();
     var_dump($m,$c,$k);
     
     echo "<p>-------------- Mamífero----------------</p>";
     
     
     $m->setPeso(5.70);
     $m->setIdade(8);
     $m->setMembros(4);
     $m->locomover(); // Correndo 
     $m->alimentar(); // Mamando
     $m->emitirSom(); // Som de mamífero
     
     echo "<p>-------------- Canguru----------------</p>";
     
     
     $c->setpeso(55.30);
     $c->setIdade(3);
     $c->setMembros(4);
     $c->locomover(); // saltando
     $c->alimentar(); // mamando
     $c->emitirSom(); // som de mamífero
     $c->usarBolsa();
     
     echo "<p>-------------- Cachorro----------------</p>";
     
     
     $k->setpeso(3.94);
     $k->setIdade(5);
     $k->setMembros(4);
     $k->locomover(); // saltando
     $k->alimentar(); // mamando
     $k->emitirSom(); // som de mamífero
     $k->abanarRabo();
     
     
     
     
     
         
  ?>
</body>
</html>