<?php

/**
 * Short components will go here. Stuff like links or script tags
 */

require_once $_SERVER["DOCUMENT_ROOT"] . '/classes/Components.php';


$Novello->addComponent('test', '<h1> This is a {test}!');
