<?php

namespace App;

/**
 * Class Response
 * @package App
*/
class Response
{
    /**
     * @param $data
     * @return null
    */
    public function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        return null;
    }
}