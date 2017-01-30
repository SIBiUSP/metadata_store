<?php

    /* Exibir erros */ 
    ini_set('display_errors', 1); 
    ini_set('display_startup_errors', 1); 
    error_reporting(E_ALL);

    /* Load libraries for PHP composer */ 
    require (__DIR__.'/../vendor/autoload.php');
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->sibi->records;

?>