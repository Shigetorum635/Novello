<?php

class Autoloader
{

    public static function register()
    {

        spl_autoload_register(

            function ($class) {

                $directories = [

                    // Main files

                    $_SERVER['DOCUMENT_ROOT'] . '/API/',
                    $_SERVER['DOCUMENT_ROOT'] . '/classes/',
                    $_SERVER['DOCUMENT_ROOT'] . '/components/',
                    $_SERVER['DOCUMENT_ROOT'] . '/database/',



                ];

                foreach ($directories as $directory) {

                    if (file_exists($directory . $class . '.php')) {

                        require_once($directory . $class . '.php');
                    }
                }
            }

        );
    }
}

Autoloader::register();
