<!DOCTYPE html>
<html>
<head>
   <meta charset="utf8">
   <title>HERANÇA - EXERCÍCIO01</title>
</head>
<body>
    <?php  
      require_once __DIR__."/Pessoa.php";
      require_once __DIR__."/Visitante.php";
      require_once __DIR__."/Aluno.php";
      require_once __DIR__."/Bolsista.php";
      
     // $p = new Pessoa();
      $v = new Visitante();
      $a = new Aluno();
      $b = new Bolsista();
      
      // Visitante
      $v->setNome("Alexandre");
      $v->setSexo("Masculino");
      $v->setIdade(19);
      $v->fazerAniv();
      
      // Aluno
      $a->setNome("Akeny");
      $a->setIdade(22);
      $a->setSexo("Masculino");
      $a->setMatricula("21237");
      $a->setCurso("Contabilidade e gestão");
      $a->fazerAniv();
      $a->pagarMensalidade();
      
      //Bolsista
      $b->setNome("Banguito");
      $b->setIdade(19);
      $b->setCurso("Administraçao");
      $b->setMatricula("12384");
      $b->setSexo("Masculino");
      $b->setBolsa("Pacote completo");
      $b->fazerAniv();
      $b->pagarMensalidade();
      var_dump($v,$a,$b);
      
     
    
    ?>
</body>
</html>