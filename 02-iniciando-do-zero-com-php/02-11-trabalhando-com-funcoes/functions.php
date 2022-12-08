<?php

function functionName($arg1, $arg2, $arg3)
{
    $body = [$arg1,$arg2,$arg3];
    return $body;
}

/* Primeiros argumentos : obrigatórios ::: segundos argumentos : importantes ::: terceiros argumentos : opcionais */
function optionsArgs($arg1, $arg2 = true, $arg3 = null)
{
    $body = [$arg1, $arg2, $arg3];
    return $body;
}

function calcImc()
{
    global $weight;
    global $height;
    
    return $weight / ($height * $height);
    
}

function payTotal($price)
{
    static $total = 0;
    $total += $price;
    return "<p>O total a pagar é ". number_format($total,2,",",".")."</p>";
}

function myTeam()
{
    $args = func_get_args();
    $count = func_num_args();
    
    return ["args" => $args,"num_args" => $count];
}
