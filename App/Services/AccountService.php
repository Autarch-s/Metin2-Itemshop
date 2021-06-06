<?php

namespace App\Services;

/**
 * Class AccountService
 * @package App\Services
*/
class AccountService extends Service
{
    /**
     * @param $username
     * @param $password
     * @return bool
    */
    public function authenticate($username, $password)
    {
        $stmt = $this->app()->db()->accountDb()->prepare('SELECT id, login, email, create_time, cash, social_id, securitycode FROM account WHERE login = ? AND password = PASSWORD(?) LIMIT 1');
        $stmt->execute([$username, $password]);
        $account = $stmt->fetch(\PDO::FETCH_OBJ);
        if(false !== $account) {
            $properties = get_object_vars($account);
            foreach($properties as $propertyName => $propertyValue) {
                $_SESSION['account'][$propertyName] = $propertyValue;
            }
        }

        if(isset($_SESSION['account']) && isset($_SESSION['account']['id'])) {
            $stmt = $this->app()->db()->playerDb()->prepare('SELECT name, level FROM player WHERE account_id = ?');
            $stmt->execute([$_SESSION['account']['id']]);
            $characters = $stmt->fetchAll(\PDO::FETCH_OBJ);

            foreach($characters as $character) {
                $_SESSION['account']['characters'][] = $character;
            }
        }

        return (false !== $account);
    }
}