<!DOCTYPE html>
<html>
<head>
   <meta charset="utf8">
   <title>Métodos getters e setters e construtor</title>
</head>

<body>
    <?php 
      require __DIR__."/Caneta.php";
      
      $c1 = new Caneta("Bic","Amarela",0.78);
      $c2 = new Caneta("Bravo","Azul",0.5);
      /*

       $c1->setModelo("Bravo");
       $c1->setPonta(0.5);
      // $c1->ponta = 0.6;
       
       var_dump($c1);
       */
      
      var_dump($c1,$c2);
       
       echo "<p>Eu tenho uma caneta {$c1->getModelo()} de ponta {$c1->getPonta()}</p>";
    ?>
</body>
</html>