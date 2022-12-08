<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.07 - Manipulação de arquivos");

/*
 * [ verificação de arquivos ] file_exists | is_file | is_dir
 */
fullStackPHPClassSession("verificação", __LINE__);

$file = __DIR__."/file.txt"; 

if(file_exists($file) && is_file($file)){
    echo "<p>Existe!</p>";
} else {
    echo "Não existe";
}

var_dump([
    "file_exists" => file_exists($file),
    "is_file" => is_file($file),
    
]);


/*
 * [ leitura e gravação ] fopen | fwrite | fclose | file
 */
fullStackPHPClassSession("leitura e gravação", __LINE__);

if(!file_exists($file) || !is_file($file)){
    $open = fopen($file,"w");
    fwrite($open,"Linha 1".PHP_EOL);
    fwrite($open,"Linha 2".PHP_EOL);
    fwrite($open,"Linha 3".PHP_EOL);
    fwrite($open,"O ALEXANDRE DUZENTOS É LINDO");
    fclose($open);
} else {
    var_dump([
        file($file),
        pathinfo($file),
    ]);
    
}

var_dump(file($file));
var_dump(pathinfo($file));

$open = fopen($file,"r");
while(!feof($open)){
    echo "<p> ".fgets($open)."</p>";
}
fclose($open);




/*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);

$getContents = __DIR__."/teste2.txt";

if(file_exists($getContents) && is_file($getContents)){
   echo file_get_contents($getContents); //DA UMA SAÍDA NO CONTEÚDO DO ARQUIVO
} else {
    $data = "<article><h1>ROBSON</h1><p>CEO UPINSIDE</p></article>";
    file_put_contents($getContents,$data); //CRIA O ARQUIVO E DEFINE SEU CONTEÚDO
    echo file_get_contents($getContents);
}