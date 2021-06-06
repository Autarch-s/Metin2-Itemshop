<?php

namespace App\Model;

use App\Services\Service;

/**
 * Class Account
 * @package App\Model
 *
 * @property-read $id
 * @property-read $login
 * @property-read $email
 * @property-read $create_time
 * @property-read $cash
 * @property-read $social_id
 * @property-read $securitycode
*/
class Account
{
    /**
     * @return bool
    */
    public function isAuthenticated()
    {
        return (isset($_SESSION['account']) && isset($_SESSION['account']['id']));
    }

    /**
     * @param $propertyName
     * @return mixed|null
    */
    public function __get($propertyName)
    {
        if(isset($_SESSION['account']) && isset($_SESSION['account'][$propertyName])) {
            return $_SESSION['account'][$propertyName];
        }
        return null;
    }

    /**
     * @return object
    */
    public function get()
    {
        return (object)$_SESSION['account'];
    }

    /**
     * @return array|mixed
    */
    public function characters()
    {
        return $_SESSION['account']['characters'] ?? [];
    }
}