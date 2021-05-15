<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/Database.php';
class Auth extends Database
{
    static function auth($username, $password)
    {
        session_start();
        if ($this::isAuth()) {
            return ['error' => 'User is already authenticated', 'error' => true];
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
    private static function getDetails($username){
        global $database;
        $database
    }
}
