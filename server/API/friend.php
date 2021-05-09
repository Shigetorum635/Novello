<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/autoloader.php';
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
echo var_dump($input);
