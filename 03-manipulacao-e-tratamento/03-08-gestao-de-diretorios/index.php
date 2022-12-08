<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.08 - Gestão de diretórios");

/*
 * [ verificar, criar e abrir ] file_exists | is_dir | mkdir  | scandir
 */
fullStackPHPClassSession("verificar, criar e abrir", __LINE__);

$folder = __DIR__."/uploads";

if(!file_exists($folder) || !is_dir($folder)){
    mkdir($folder,0755);
} else {
    var_dump(scandir($folder));
}


/*
 * [ copiar e renomear ] copy | rename
 */
fullStackPHPClassSession("copiar e renomear", __LINE__);

$file = __DIR__."/file.txt";
var_dump([
    pathinfo($file),
    scandir($folder),
    scandir(__DIR__),
]);

if(!file_exists($file) || !is_file($file)){
    fopen($file,"w");
} else {
    var_dump(filemtime($file)); // Retorna o tempo de modificação de criação entre dois ou mais arquivos
    copy(__DIR__."/file.txt",__DIR__."/remove/".time().".txt");//Cópia um arquivo de uma pasta para a outra
    rename(__DIR__."/file.txt",__DIR__."/".time().pathinfo($file)["extension"]); //Renomeia um arquivp
}

/*
 * [ remover e deletar ] unlink | rmdir
 */
fullStackPHPClassSession("remover e deletar", __LINE__);


$dirRemove = __DIR__."/remove";

//rmdir($dirRemove); //Não removerá o diretório,pois este não está vazio.


// A função array_diff faz a diferença entre dois arrays
$dirFiles = array_diff(scandir($dirRemove),[".",".."]);
$dirCount = count($dirFiles);//Conta as posições do array

var_dump([
    $dirRemove,
    $dirFiles,
    $dirCount,
]);


if($dirCount >= 1) {
    echo "<p>Clear</p>";
    foreach(scandir($dirRemove) as $fileName){
        $fileName2 = __DIR__."/remove/{$fileName}";
        if(file_exists($fileName2) && is_file($fileName2)){
            unlink($fileName2);
        }
    }
}
    
    
    // Rotina para remover arquivos do diretório gestão de diretórios
    $dirRemove = __DIR__;
    
    // A função array_diff faz a diferença entre dois arrays
    $dirFiles = array_diff(scandir($dirRemove),[".","..","index.php"]);
    $dirCount = count($dirFiles);//Conta as posições do array
    
  
    if($dirCount >= 1) {
        echo "<p>Clear</p>";
        foreach($dirFiles as $fileName){
            //$fileName2 = __DIR__."/{$fileName}";
            if(file_exists($fileName) && is_file($fileName)){
                unlink($fileName);
            }
            
        }
        
    }