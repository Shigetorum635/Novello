<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/autoloader.php';

$B = AuthController::Authenticate("aaaa", "bbb");
Core::json(200, $B);
?>
