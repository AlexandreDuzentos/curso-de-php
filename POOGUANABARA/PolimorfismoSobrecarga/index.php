<!DOCTYPE html>
<html>
<head>

</head>
<body>
   <?php 
     require_once __DIR__."/Animali.php";
     require_once __DIR__."/Mamifero.php";
     require_once __DIR__."/Lobo.php";
     require_once __DIR__."/Cachorro.php";
     //$animal = new Animali();
     
     $m = new Mamifero();
     $l = new Lobo();
     $c = new Cachorro();
     
     echo "<h1>-----------Emissão de sons para animais diferentes-----------</h1>";
     echo "<h2>";
     $m->emitirSom(); // Som de mamífero
     $l->emitirSom(); // Auuuuuuuuuu
     $c->emitirSom(); // Au!Au!Au
     echo "</h2>";
     
     
     echo "<h1>-----------Gambiarra de espécie de polimorfismo de sobrecarga-----------</h1>";
     echo "<h2>";
     $c->reagirFrase("Toma comida");
     $c->reagirHorario(12);
     $c->reagirDono(true);
     $c->reagirIdadePeso(5, 5);
     echo "</h2>";
   ?>
</body>
</html>