<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.10 - Upload de arquivos");

/*
 * [ upload ] sizes | move uploaded | url validation
 * [ upload errors ] http://php.net/manual/pt_BR/features.file-upload.errors.php
 */
fullStackPHPClassSession("upload", __LINE__);

$folder = __DIR__."/uploads";

if(!file_exists($folder) || !is_dir($folder)){
    mkdir($folder,0755);
}

var_dump([
    "filesize" => ini_get("upload_max_filesize"), // limite de tamanho de arquivo por campo de formulário
    "postsize" => ini_get("post_max_size"), //  limite de tamanho de arquivo formulário
]);

var_dump([
    filetype(__DIR__."/index.php"),
    mime_content_type(__DIR__."/index.php"),

]);

$getPost = filter_input(INPUT_GET,"post",FILTER_VALIDATE_BOOLEAN);

// O $_FILES VERIFICA SE A REQUISIÇÃO DE UM ARQUIVO FOI FEITA,NÃO SE O ARQUIVO FOI RECEBIDO.
// O $_FILES["file"]["name"] TESTA E O ARQUIVO POSSUI CONTEÚDO
// O $getPost serve para a aplicação saber se o usuário interagiu com o formulário
// Quando o arquivo enviado ultrapassa o limite do tamanho permitido,a aplicação ignora o arquivo.

/*
O $getPost testa se o usuário interagiu com o formulário, mas o arquivo não foi recebido pelo servidor 
pelo fato do tamanho do arquivo ter ultrapassado o limite do tamanho permitido, O array $_FILES permanece vazio

*/



if($_FILES && !empty($_FILES["file"]["name"])){
    $fileUpload = $_FILES['file'];
    
    $allowedTypes = [
        "image/jpg",
        "image/jpeg",
        "image/png",
        "application/pdf",
    ];
    
    $newFilename = time().strstr($fileUpload["name"],".");
    
    if(in_array($fileUpload['type'],$allowedTypes)) {
        move_uploaded_file($fileUpload['tmp_name'],__DIR__."/uploads/{$newFilename}");
        echo "<p class='trigger accept'>Arquivo enviado com sucesso!</p>";
    } else {
            echo "<p class='trigger error'>Erro inesperado!</p>";
    }
    
} elseif ($getPost == true && empty($_FILES)) {
         echo "<p class='trigger warning'>Whoops, parece que o arquivo é muito grande!</p>";
} else {
    
       echo "<p class='trigger warning'>Selecione um arquivo antes de enviar</p>";
}
    

include __DIR__."/form.php";