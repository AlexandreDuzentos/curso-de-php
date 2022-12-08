<!DOCTYPE html>
<html>
<head>
   <meta charset = "utf8">
   <title>PROJECTO FINAL</title>
</head>
<body>
<?php 
  require_once __DIR__."/AcoesVideo.php";
  require_once __DIR__."/Video.php";
  require_once __DIR__."/Pessoa.php";
  require_once __DIR__."/Gafanhoto.php";
  require_once __DIR__."/Visualizacao.php";
  
   $v = [];
   $g = [];
   $vis = [];
   
   $v[0] = new Video("The rookie");
   $v[1] = new Video("Law and order - organized crime");
   $v[0] = new Video("Louis e superman");
   
   $g[0] = new Gafanhoto("Alexandre",19,"M","Alex");
   
   $vis[0] = new Visualizacao($g[0], $v[0]);
   
   $vis[1] = new Visualizacao($g[0], $v[1]);
   
   
   $vis[0]->avaliar();
   $vis[1]->avaliarPorc(85);
   var_dump($vis);
   
   
  
  
?>
</body>
</html>