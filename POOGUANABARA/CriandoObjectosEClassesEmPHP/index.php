<!DOCTYPE html>
<html>
<head>
   <meta charset="utf8">
   <title>CRIANDO OBJECTOS E CLASSES</title>
</head>

<body>
    <?php 
       require_once "Caneta.php";
       $c1 = new Caneta();
       $c1->modelo = "bic";
       $c1->cor = "vermelho";
       $c1->ponta = 0.5;
       $c1->tampada = false;
       $c1->carga = "70%";
       
       $c1->tampar();
       $c1->destampar();
       
       $c1->rabiscar();
       var_dump($c1);
       print_r($c1);
       
       
       echo "<br> ---------------------------------------------------------";
       
       $c2 = new Caneta();
       $c2->modelo = "Bravo";
       $c2->cor = "Azul";
       $c2->ponta = 0.7;
       $c2->tampada = true;
       $c2->carga = "15%";
       $c2->rabiscar();
       $c2->destampar();
       $c2->rabiscar();
       $c2->tampar();
       $c2->rabiscar();
       var_dump($c2);
    ?>
</body>
</html>
