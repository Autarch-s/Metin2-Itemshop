<?php

namespace App\Controller;

/**
 * Class LoginController
 * @package App\Controller
*/
class LoginController extends Controller
{
    /**
     * @return array|false|string|string[]
    */
    public function index()
    {
        $registeredAccountCount = $this->app()->db()->accountDb()->query("SELECT COUNT(id) FROM account")->fetch();

        return $this->viewService()
            ->setLayout('unauthorized')
            ->setView('login')
            ->setData(compact('registeredAccountCount'))
            ->render();
    }
}