<?php

/**
 * Short components will go here. Stuff like links or script tags
 */

require_once $_SERVER["DOCUMENT_ROOT"] . '/classes/Components.php';

$Novello->addComponent('novello-script', `
    <script src="{src_1}?c={numbers}"></script>
`);

$Novello->addComponent('test', '<h1> This is a {test}!');
