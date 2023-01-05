<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.10 - Model bootstrap e cadastro");

require __DIR__ . "/source/autoload.php";

/*
 * [ bootstrap ] Inicialização de dados
 */
fullStackPHPClassSession("bootstrap", __LINE__);

$model = new \Source\Models\UserModel();

$user = $model->bootstrap("Alexandre","Duzentos","Aduzentos12@gmail","128472717");

var_dump($model);



/*
 * [ save create ] Salvar o usuário ativo (Active Record)
 */
fullStackPHPClassSession("save create", __LINE__);

$user->email = "alexandre";

if(!$model->find($model->email)){
   echo "<p class='trigger warning'>Cadastro</p>";
   $model->save();
   var_dump($model);
} else {
   echo "<p class='trigger accept'>Read</p>";
}



