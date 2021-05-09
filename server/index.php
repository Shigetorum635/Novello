<?php

$requires = [

    $_SERVER['DOCUMENT_ROOT'] . '/autoloader.php',

];

foreach ($requires as $require) {

    require_once $require;
}

Routes::get('/api/v1/welcome', 'API/welcome.php');
Routes::get('/user/$id', 'views/users.php');
