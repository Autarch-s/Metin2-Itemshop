<?php

namespace App\Controller;

/**
 * Class AccountController
 * @package App\Controller
*/
class AccountController extends Controller
{
    /**
     * @return null
    */
    public function login()
    {
        $username = $_REQUEST['username'] ?? '';
        $password = $_REQUEST['password'] ?? '';

        if(!strlen($username) || !strlen($password)) {
            return $this->app()->response()->json([
                'success' => false,
                'msg' => 'Felhasználó név és jelszó megadása kötelező!'
            ]);
        }

        $authenticationSuccessful = (new \App\Services\AccountService())->authenticate($username, $password);

        if($authenticationSuccessful) {
            return $this->app()->response()->json([
                'success' => true,
                'redirectUrl' => '/'
            ]);
        } else {
            return $this->app()->response()->json([
                'success' => false,
                'msg' => 'Hibás felhasználónév vagy jelszó!'
            ]);
        }
    }

    /**
     * @return null
    */
    public function logout()
    {
        unset($_SESSION['account']);
        unset($_SESSION['account']['characters']);
        return $this->app()->response()->json([
            'success' => true,
            'redirectUrl' => '/login'
        ]);
    }
}