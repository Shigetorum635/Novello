<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/Database.php';
class Auth
{
    static function auth($username, $password)
    {
        session_start();
        if ($this::isAuth()) {
            return false;
        }
    }
    static function isAuth()
    {
        session_start();
        if (!$_SESSION['id']) {
            return false;
        }
        return true;
    }
}
