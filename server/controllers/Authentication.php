<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/autoloader.php';
function checkAuth(){
    $Payload = Core::getParams();
    $Response = AuthController::Authenticate($Payload['username'], $Payload['password']);
    Core::json(200, $Response);
}

?>
