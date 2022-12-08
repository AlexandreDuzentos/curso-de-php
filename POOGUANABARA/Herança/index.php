<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf8">
  <title>HERANÇA</title>
</head>
<body>
<?php 
      require_once __DIR__."/Pessoa.php";
      require_once __DIR__."/Aluno.php";
      require_once __DIR__."/Professor.php";
      require_once __DIR__."/Funcionario.php";
      
      //$p1 = new Pessoa();
      $p2 = new Aluno();
      $p3 = new Professor();
      $p4 = new Funcionario();
      
      $p1->setNome("Pedro");
      $p2->setNome("Maria");
      $p3->setNome("Claúdio");
      $p4->setNome("Fabiana");
      var_dump($p1,$p2,$p3,$p4);
      
      $p2->setCurso("Imformática");
      $p3->setSalario(2500.70);
      $p4->setSetor("Estoque");
      var_dump($p2,$p3,$p4);
      
      
      $p1->receberAumento();
      $p2->mudarTrabalho();
      $p4->cancelarMatr();
     
     
?>
</body>
</html>
