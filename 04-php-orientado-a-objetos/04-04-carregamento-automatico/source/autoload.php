<?php

spl_autoload_register(function($class){
	$namespace = "Source\\";
	$baseDir = __DIR__."/";
	$length = strlen($namespace);

	if(strncmp($namespace,$class,$length) !== 0){
       return;
	}

	$relativeClass = substr($class,$length);

    $file = $baseDir . str_replace("\\","/",$relativeClass). ".php";

    if(file_exists($file)){
    	require $file;
    }
   
})

?>