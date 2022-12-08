<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf8">
  <title>EXERCÍCIO01 - RELACIONAMENTO ENTRE CLASSES</title>
</head>
<body>
   <?php 
     require_once __DIR__."/luta.php";
     require_once __DIR__."/Lutador.php";
     $l = [];
     $l[0] = new Lutador("Pretty boy","França",31, 1.75,68.9, 0,2,1);
     $l[1] = new Lutador("Putscript","Brasil",29, 1.68,57.8, 0,2,3);
     $luta = new Luta();
     $luta->setDesafiado($l[0]);
     $luta->setDesafiante($l[1]);
     $luta->setRounds(2);
     $luta->marcarLuta($l[0],$l[1]);
     $luta->lutar();
     var_dump($luta)
     
  
     
     //var_dump($l1,$l2,$l3,$l4,$l5);
   ?>
</body>
</html>