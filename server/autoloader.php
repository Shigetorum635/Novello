<?php

class Autoloader
{

    public static function register()
    {

        spl_autoload_register(

            function ($class) {

                $directories = [

                    // Main files
                    
                    $_SERVER['DOCUMENT_ROOT'] . '/controllers/',
                    $_SERVER['DOCUMENT_ROOT'] . '/classes/',
                    $_SERVER['DOCUMENT_ROOT'] . '/components/',
                    $_SERVER['DOCUMENT_ROOT'] . '/database/',
                    $_SERVER['DOCUMENT_ROOT'] . '/provider/',





                ];

                foreach ($directories as $directory) {

                    if (file_exists($directory . $class . '.php')) {

                        require_once($directory . $class . '.php');
                    }
                }
                
                require_once($_SERVER['DOCUMENT_ROOT'].'/provider/Auth.php');
            }

        );
    }
}

Autoloader::register();
