<?php
class Core
{
    static function json($code, $arr)
    {
        http_response_code($code);
        header('content-type: application/json');
        header('joe: mama ahahah funny!!');
        header('novello: mommy milkers big :flooshed:');
        echo json_encode($arr);
    }
}
