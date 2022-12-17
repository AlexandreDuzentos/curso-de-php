<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.10 - Fundamentos da abstração");

require __DIR__ . "/source/autoload.php";

/*
 * [ superclass ] É uma classe criada como modelo e regra para ser herdada por outras classes,
 * mas nunca para ser instanciada por um objeto.
 */
fullStackPHPClassSession("superclass", __LINE__);

use \Source\App\User;
//use \Source\Bank\Account;

$user = new User("Alexandre", "Duzentos");
/*
$account = new Account(
    "1600",
    "22345",
    $user,
    "1000"
);
*/

//var_dump($user, $account);


/*
 * [ especialização ] É uma classe filha que implementa a superclasse e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.a", __LINE__);

use \Source\Bank\AccountSaving;

$accountsaving = new AccountSaving(
     "1600",
    "22345",
    $user,
    "0"
);

$accountsaving->extract();
$accountsaving->deposit(1000);
$accountsaving->withdrawal(1000);
var_dump($accountsaving);




/*
 * [ especialização ] É uma classe filha que implementa a superclass e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.b", __LINE__);


use \Source\Bank\AccountCurrent;


$accountCurrent = new AccountCurrent(
      "1600",
    "22345",
    $user,
    "1000",
    "1000"
);


$accountCurrent->deposit(1000);
$accountCurrent->withdrawal(2000);
$accountCurrent->withdrawal(500);

$accountCurrent->extract();

var_dump($accountCurrent);
