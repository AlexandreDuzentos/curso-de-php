<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.05 - Manipulação de datas");

/*
 * [ a função date ] setup | output
 * [ date ] https://php.net/manual/pt_BR/function.date.php
 * [ timezones ] https://php.net/manual/pt_BR/timezones.php
 */
fullStackPHPClassSession("a função date", __LINE__);

var_dump([
    "Pegar o Fuso horário" => date_default_timezone_get(),
    "função para exibir uma data" => date(DATE_W3C),
    "função para exibir uma data2" => date("d/m/Y H:i:s")
]);

define("DATE_BR","d/m/Y h:i:s"); // definindo uma constante com um formato de data
define("TIMEZONE","Africa/Luanda"); // definindo uma constate com um timezone

date_default_timezone_set(TIMEZONE);

var_dump([
    "pegar o fuso horário definido" => date_default_timezone_get(),
    "função para exibir a hora" => date("d/m/Y h:i:s"),
]);


var_dump(getdate()); // Retorna um array com várias informações sobre a data atual

echo "<p>Hoje é dia ". getDate()['yday']." do ano</p>";

/**
 * [ string to date ] strtotime | strftime
 */
fullStackPHPClassSession("string to date", __LINE__);

var_dump([
    "strtotime NOW" => strtotime("now"), // Retornar a hora atual em segundos desde 1 de janeiro de 1970
    "time" => time(),
    "strtotime+10d" => strtotime("+10day"), //Retornar a hora atual em segundos desde o dia 1 janeiro de 1970 mais 10 dias
    "strtotime-10d" => strtotime("-1day"), //Retornar a hora atual em segundos desde o dia 1 janeiro de 1970 mais 10 dias
    "date DATE_BR" => date(DATE_BR),
    "date + 20days" => date("d/m/Y h:i:s",strtotime("+20days")),
    "date + 5years" => date("d/m/Y h:i:s",strtotime("+5years"))
]);


$format = "%d/%m/%Y %Hh%M";

echo "<p>A data de hoje é ".strftime($format)."</p>";

echo strftime("<p>Data atual %d/%m/%Y - hora atual:%H:%M:%S</p>");