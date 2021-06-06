<?php

namespace App;

/**
 * Class Router
 * @package App
*/
class Router
{
    /**
     * @param $url
     * @param $controller
     * @param $function
     * @return mixed|null
    */
    public function view($url, $controller, $function)
    {
        if($url === $_SERVER['REQUEST_URI']) {
            $controller = new $controller;
            return $controller->$function();
        }
        return null;
    }

    /**
     * @TODO HTTP Method implementáció (GET, POST, DELETE, stb)
     *
     * @param $url
     * @param $controller
     * @param $function
     * @return mixed|null
    */
    public function ajax($url, $controller, $function)
    {
        if(true === $this->isAjax() && (strpos($_SERVER['REQUEST_URI'], $url) !== FALSE)) {
            $controller = new $controller;
            return $controller->$function();
        }
        return null;
    }

    /**
     * @return bool
    */
    private function isAjax()
    {
        return ('XMLHttpRequest' == (isset($_SERVER['HTTP_X_REQUESTED_WITH'])?$_SERVER['HTTP_X_REQUESTED_WITH']:null));
    }

    /**
     * @return bool
    */
    public function guard()
    {
        if(false === $this->isAjax()) {
            $allowedRoutesForUnauthorized = [
                '/login',
            ];
            if(false === (new \App\Model\Account())->isAuthenticated() && $_SERVER['REQUEST_URI'] !== end($allowedRoutesForUnauthorized)) {
                header('Location: '.end($allowedRoutesForUnauthorized));
                exit;
            }
        }
        return true;
    }
}