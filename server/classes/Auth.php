<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/Database.php';
class Auth extends Database
{
    static function auth($username, $password)
    {
        global $database;
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
