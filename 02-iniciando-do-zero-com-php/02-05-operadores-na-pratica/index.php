<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
echo fullStackPHPClassName("02.05 - Operadores na prática");

/**
 * [ operadores ] https://php.net/manual/pt_BR/language.operators.php
 * [ atribuição ] https://php.net/manual/pt_BR/language.operators.assignment.php
 */
fullStackPHPClassSession("atribuição", __LINE__);

$operator = 5;
$operators = [
   "a += 5"  => ($operator += 5),
   "a -= 5" => ($operator -= 5),
   "a *= 5" => ($operator *= 5),
   "a /= 5" => ($operator /= 5) 
];

var_dump($operators);

$incrementA = 5;
$incrementB = 5;


$increment = [
    "Pós-incremento" => $incrementA++,
    "Res-incremento" => $incrementA,
    "Pré-incremento" => ++$incrementA,
    "Pós-Decremento" => $incrementA--,
    "Res-Decremento" => $incrementA,
    "Pré-Decremento" => --$incrementA,
    
];
var_dump($increment);

/**
 * [ comparação ] https://php.net/manual/pt_BR/language.operators.comparison.php
 */
fullStackPHPClassSession("comparação", __LINE__);

$relatedA = 5;
$relatedB = "5";
$relatedC = 10;

$related = [
    "a == c" => ($relatedA == $relatedC),
    "a == b" => ($relatedA == $relatedB),
    "a === b" => ($relatedA === $relatedB),
    "a != b" => ($relatedA != $relatedB),
    "a !== b" => ($relatedA !== $relatedB),
    "a > c" => ($relatedA > $relatedC),
    "a < c" => ($relatedA < $relatedC),
    "a >= b" => ($relatedA >= $relatedB),
    "a >= c" => ($relatedA >= $relatedC),
    "a <= c" => ($relatedA <= $relatedC)
];

var_dump($related);


/**
 * [ lógicos ] https://php.net/manual/pt_BR/language.operators.logical.php
 */
fullStackPHPClassSession("lógicos", __LINE__);

$logicA = true;
$logicB = false;

$logic = [
    "a && b" => ($logicA && $logicB),
    "a || b" => ($logicA || $logicB),
    "a" => ($logicA),
    "b" => ($logicB),
    "!a" => (!$logicA),
    "!b" => (!$logicB),
    
];

var_dump($logic);




/**
 * [ aritiméticos ] https://php.net/manual/pt_BR/language.operators.arithmetic.php
 */
fullStackPHPClassSession("aritiméticos", __LINE__);

$calcA = 5;
$calcB = 10;

$calc = [
    "a + b" => $calcA + $calcB,
    "a - b" => $calcA - $calcB,
    "a * b" => $calcA * $calcB,
    "a / b" => $calcA / $calcB,
    "a % b" => $calcA % $calcB,
];

var_dump($calc);
