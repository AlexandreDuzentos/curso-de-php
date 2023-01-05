<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.11 - Carregando e atualizando");

require __DIR__ . "/source/autoload.php";

/*
 * [ save update ] Salvar o usuário ativo (Active Record)
 */
fullStackPHPClassSession("save update", __LINE__);

$model = new \Source\Models\UserModel();

$user = $model->load(5);

$user->id = 1;
$user->bootstrap("Paulo", "Silveira", "paulo12@gmail.com", 23873832);

var_dump($user);


$user->save();

var_dump($user);


