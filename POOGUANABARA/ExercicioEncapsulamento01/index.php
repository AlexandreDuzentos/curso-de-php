<!DOCTYPE html>
<html>
<head>
   <meta charset = "utf8">
   <title>EXERCÍCIO 02 - ENCAPSULAMENTO</title>
</head>
<body>
  <?php 
     //require __DIR__."/Controlador.php";
     require __DIR__."/ControleRemoto.php";
     
     $cr = new ControleRemoto();
     $cr-> ligar();
     $cr->abrirMenu();
     $cr->maisVolume();
     var_dump($cr);
     
  ?>
</body>
</html>