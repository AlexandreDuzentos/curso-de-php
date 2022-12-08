<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.09 - Closures e generators");

/*
 * [ closures ] https://php.net/manual/pt_BR/functions.anonymous.php
 */
fullStackPHPClassSession("closures", __LINE__);

$myAge = function($birthYear){
    $age = date("Y") - $birthYear;
    return "<h5>Você tem {$age} anos</h5>";
};

echo $myAge(2003);
echo $myAge(2000);
echo $myAge(2001);
echo $myAge(1999);

$priceBrl = function($price){
    return number_format($price,2,",",".");
};
echo "<p>O projecto custa {$priceBrl(3600)} vamos fechar?</p>";

$myCart = [];
$myCart["totalPrice"] = 0;

$cartAdd = function($item,$qtd,$price) use (&$myCart){
    $myCart[$item] = $qtd * $price;
    $myCart['totalPrice'] += $myCart[$item]; 
    return $myCart;
};

$cartAdd("HTML",1,580);
$cartAdd("Jquery",2,340);

var_dump($myCart);
var_dump($cartAdd);


/*
 * [ generators ] https://php.net/manual/pt_BR/language.generators.overview.php
 */
fullStackPHPClassSession("generators", __LINE__);


$iterator = 300000;

/*
$showDates = function($days){
    for($day = 1; $day <= $days; $day++){
        $saveDates[] = date("d/m/Y",strtotime("+{$day}days"));
    }
    return $saveDates;
};

echo "<div style='text-align:center'>";
foreach($showDates(1) as $date){
     echo "<small class='tag' style='margin:2px'>$date</small>".PHP_EOL;
}
echo "</div>";
*/


$generatorDate = function($days){
    for($day = 1; $day <= $days; $day++){
        yield date("d/m/Y",strtotime("+{$day}days"));
    }
   
};


echo "<div style='text-align:center'>";
foreach($generatorDate($iterator) as $date){
    echo "<small class='tag' style='margin:2px'>$date</small>".PHP_EOL;
}
echo "</div>";