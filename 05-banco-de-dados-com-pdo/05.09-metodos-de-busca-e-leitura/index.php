<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.09 - Métodos de busca e leitura");

require __DIR__ . "/source/autoload.php";

/*
 * [ load ] Por primary key (id)
 */
fullStackPHPClassSession("load", __LINE__);

$model = new \Source\Models\UserModel();

$user = $model->load(5);
var_dump($user, $user->first_name, $user->last_name);


/*
 * [ find ] Por indexes da tabela (email)
 */
fullStackPHPClassSession("find", __LINE__);

$user = $model->find("willian28@email.com.br");
var_dump($user);


/*
 * [ all ] Retorna diversos registros
 */
fullStackPHPClassSession("all", __LINE__);

/*
 o limit especifica o número de registros a serem retornados e o offset a partir de qual registro serão retornados
 */
$allUsers = $model->all(5,6);

foreach($allUsers as $user){
    $user->firsrt_name = "Matias";
    var_dump($user, $user->first_name);
}



