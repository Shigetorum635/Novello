<?php

class RouteComponents
{
    public $name;
    public $components = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function component(string $name, array $slots, bool $sanitize = false)
    {
        if (!array_key_exists($name, $this->components) || (array_keys($slots) === range(0, count($slots) - 1))) {
            return;
        }

        $component = $this->components[$name];
        if ($sanitize) {
            foreach ($slots as $name => $value) {
                $component = str_replace('{' . $name . '}', htmlspecialchars($value), $component);
            }
        } else {
            foreach ($slots as $name => $value) {
                $component = str_replace('{' . $name . '}', $value, $component);
            }
        }


        echo $component;
    }
    public function addComponent($name, $html)
    {
        $this->components[$name] = $html;
    }
}

$Novello = new RouteComponents('Novello');
require $_SERVER["DOCUMENT_ROOT"] . '/components/loginForm.php';
require $_SERVER["DOCUMENT_ROOT"] . '/components/mainComponents.php';
