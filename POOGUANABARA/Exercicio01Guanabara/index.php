<!DOCTYPE html>
<html>
<head>
   <meta charset="utf8">
   <title>EXERCÍCIO01 - Classe conta banco</title>
</head>
<body>
    <?php 
      require __DIR__."/ContaBanco.php";
      $p1 = new ContaBanco(); // jubileu
      $p2 = new ContaBanco(); // Creusa
      $p1->abrirConta("cc");
      $p1->setDono("Jubileu");
      $p1->setNumConta(1111);
      
      $p2->abrirConta("cp");
      $p2->setDono("Creuza");
      $p2->setNumConta(2222);
     
      
      $p1->depositar(300);
      $p2->depositar(500);
      
      $p2->sacar(100);
      
      $p1->pagarMensal();
      $p2->pagarMensal();
      
      $p1->sacar(338);
      $p2->sacar(530);
      
      $p1->fecharConta();
      $p2->fecharConta();
      
      var_dump($p1,$p2);
      
    ?>
</body>
</html>