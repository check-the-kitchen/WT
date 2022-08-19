<?php
    $requests = explode( ';', $_POST['text']);

    $host = 'localhost';
    $name = 'root';
    $password = 'kacha22EV!';
    $database = 'Contacts';
    $link = mysqli_connect($host, $name, $password, $database);

    for ($i=0; $i < count($requests)-1; $i++){
        $requests[$i] = $requests[$i] .';';
    }

    $memory_fisrt = memory_get_usage();
    $time_first = microtime(true);
    for ($i=0; $i < count($requests)-1; $i++){
        $result = mysqli_query($link, $requests[$i]);
    }
    echo memory_get_usage()-$memory_fisrt, '<br>';
    echo microtime(true) - $time_first;
