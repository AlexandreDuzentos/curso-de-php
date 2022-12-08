<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);

//define("DATE_BR","d-m-Y H:i:s"); Funciona
define("DATE_BR","d/m/Y H:i:s");
$dateNow = new DateTime();
$dateBirth = new DateTime("16-05-2003");
//$dateBirth = new DateTime("16/05/2003"); não funciona

var_dump([
    $dateNow,
    $dateBirth
]);

var_dump([
    $dateNow->format(DATE_BR), //Retorna a data no formato especificado
    $dateNow->format("d"), // Retorna o dia
    $dateNow->format("m"), // Retorna o mês
    $dateNow->format("Y"), //Retorna o ano com os quatro dígitos
    $dateNow->format("y") //Retorna o ano com os últimos dois dígitos
]);

echo "<p>Hoje é dia ",$dateNow->format("d")," de ",$dateNow->format("M")," ",$dateNow->format("Y"),"</p>";

$newTimeZone =  new DateTimezone("Africa/luanda");
$newDateTime = new DateTime("now", $newTimeZone);

var_dump([
    $newTimeZone,
    $newDateTime,
]);


/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

$dateInterval = new DateInterval("P10Y8M5DT10H30M18S");
var_dump($dateInterval);

$dateTime = new DateTime("now");
/*$dateTime->add($dateInterval); Adiciona um intervalo de data a data especificada no
construtor da classe*/

$dateTime->sub($dateInterval); 
var_dump($dateTime);

$timeZone = new DateTimeZone("Africa/luanda");

$dateNow = new DateTime("now",$timeZone);
$birthDate = new DateTime("16-05-2022",$timeZone);

$diff = $dateNow->diff($birthDate); // Retorna a diferença entre duas datas

var_dump([
    $birthDate,
    $dateNow,
    $diff, // O ATRIBUTO INVERT DIZ SE A DATA DO ARGUMENTO DA FUNÇÃO DA PASSOU(1) OU AINDA(0)
]);

if($diff->invert == 1){
    echo "<p>Seu aniversário foi a ". $diff->days." dias</p>";
} else { 
    echo "<p>Faltam ",$diff->days,"dias para o seu aniversário</p>";
}

/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

$newDateTimeZone = new DateTimeZone("Africa/Luanda");
$start = new DateTime("16-05-2003",$newDateTimeZone);
$interval = new DateInterval("P2M");
$end = new DateTime("now",$newDateTimeZone);
$datePeriod = new DatePeriod($start,$interval,$end);

var_dump([
    $start,
    $interval,
    $end,
    $datePeriod,
    get_class_methods($datePeriod),
    $datePeriod->getRecurrences(),
]);


echo "<h1>Sua assinatura</h1>";

foreach($datePeriod as $recurrences){
    echo "<p>Próximo vencimento ",$recurrences->format("d/m/Y H:i:s"),"</p>";
}