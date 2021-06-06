<?php

namespace App\Controller;

/**
 * Class Controller
 * @package App\Controller
*/
class Controller
{
    private $app;
    private $view;

    /**
     * Controller constructor.
    */
    public function __construct()
    {
        $this->app = new \App\Application();
        $this->view = new \App\Services\View();
    }

    /**
     * @return \App\Application
    */
    public function app()
    {
        return $this->app;
    }

    /**
     * @return \App\Services\View
    */
    public function viewService()
    {
        return $this->view;
    }
}