<?php
class Core
{
    static function json($code, $arr)
    {
        http_response_code($code);
        header('content-type: application/json');
        header('Powered: Cristina');
        echo json_encode($arr);
    }
    static function getParams()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        return $data;
    }
}
