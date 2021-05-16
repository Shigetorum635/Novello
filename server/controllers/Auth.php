<?php

class AuthController
{
    static function Authenticate(
        string $username,
        string $password
    ): array {
        return [
            'Username' => $username,
            'Password' => $password
        ];
    }
    static function Register()
    {
    }
    static function CheckAuth()
    {
    }
    static function UpdateToken()
    {
    }
    static function ReviseToken()
    {
    }

    static function Destroy()
    {
    }
}
