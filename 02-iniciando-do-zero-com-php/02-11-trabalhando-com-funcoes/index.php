<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.11 - Trabalhando com funções");

/*
 * [ functions ] https://php.net/manual/pt_BR/language.functions.php
 */
fullStackPHPClassSession("functions", __LINE__);

require __DIR__."/functions.php";

var_dump(functionName("Pearl jam","AC/DC","Alter Bridge"));

var_dump(optionsArgs("Mateus"));

/*
 * [ global access ] global $var
 */
fullStackPHPClassSession("global access", __LINE__);

$weight = 86;
$height = 1.89;

echo calcImc(200);


/*
 * [ static arguments ] static $var
 */
fullStackPHPClassSession("static arguments", __LINE__);

echo payTotal(150);
echo payTotal(200);
echo payTotal(350);




/*
 * [ dinamic arguments ] get_args | num_args
 */
fullStackPHPClassSession("dinamic arguments", __LINE__);

var_dump(myTeam(1,2,3,4,5,6,7));
