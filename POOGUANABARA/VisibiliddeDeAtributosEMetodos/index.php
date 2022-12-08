<DOCTYPE html>
<html>
<head>
  <meta charset="utf8">
   <title>Visibilidade de atributos e métodos</title>
</head>
<body>
  <?php 
    require_once __DIR__."/Caneta.php";
    $c1 = new Caneta();
    $c1->modelo = "Bic cristal";
    $c1->cor = "verde";
    //$c1->ponta = 0.8;
   // $c1->carga = "12%";
   //$c1->tampada = true;
    //$c1->rabiscar();
    $c1->tampar();
    $c1->destampar();
    $c1->rabiscar();
    //$c1->destampar();
    var_dump($c1);
  ?>
</body>
</html>
