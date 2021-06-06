<?php

namespace App;

use App\Model\Account;

/**
 * Class Application
 * @package App
*/
class Application
{
    private $db;
    private $router;
    private $response;

    /**
     * Application constructor.
    */
    public function __construct()
    {
        $this->db = new Db(true);
        $this->router = new Router();
        $this->response = new Response();
        $this->account = new Account();
    }

    /**
     * @return Db
    */
    public function db()
    {
        return $this->db;
    }

    /**
     * @return Router
    */
    public function router()
    {
        return $this->router;
    }

    /**
     * @return Account
    */
    public function account()
    {
        return $this->account;
    }

    /**
     * @return Response
    */
    public function response()
    {
        return $this->response;
    }
}