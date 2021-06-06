<?php

namespace App;

/**
 * Class Db
 * @package App
 *
 * @property-read $accountDb
 * @property-read $commonDb
 * @property-read $logDb
 * @property-read $playerDb
*/
class Db
{
    private $developmentEnvironment;

    private $localHostname = '127.0.0.1';
    private $localUsername = 'root';
    private $localPassword = '';

    private $hostname = 'MYSQL_HOSTNAME';
    private $username = 'MYSQL_USERNAME';
    private $password = 'MYSQL_PASSWORD';

    private $accountDb = 'ACCOUNT_DB';
    private $commonDb = 'COMMON_DB';
    private $logDb = 'LOG_DB';
    private $playerDb = 'PLAYER_DB';

    private $accountDbh;
    private $commonDbh;
    private $logDbh;
    private $playerDbh;

    /**
     * Db constructor.
     * @param $isDevelopmentEnvironment
    */
    public function __construct($isDevelopmentEnvironment)
    {
        $this->developmentEnvironment = $isDevelopmentEnvironment;

        try {
            # Meghatározza a csatlakozáshoz szükséges adatokat
            $hostname = $isDevelopmentEnvironment ? $this->localHostname : $this->hostname;
            $username = $isDevelopmentEnvironment ? $this->localUsername : $this->username;
            $password = $isDevelopmentEnvironment ? $this->localPassword : $this->password;

            # Felcsatlakozik az s2_account adatbázisra
            $this->accountDbh = new \PDO("mysql:host={$hostname};dbname={$this->accountDb}", $username, $password);

            # Felcsatlakozik az s2_common adatbázisra
            $this->commonDbh = new \PDO("mysql:host={$hostname};dbname={$this->commonDb}", $username, $password);

            # Felcsatlakozik az s2_log adatbázisra
            $this->logDbh = new \PDO("mysql:host={$hostname};dbname={$this->logDb}", $username, $password);

            # Felcsatlakozik az s2_player adatbázisra
            $this->playerDbh = new \PDO("mysql:host={$hostname};dbname={$this->playerDb}", $username, $password);
        } catch (\PDOException $e) {
            print 'Err: '.$e->getMessage();
            exit;
        }
    }

    /**
     * @return \PDO
    */
    public function accountDb()
    {
        return $this->accountDbh;
    }

    /**
     * @return \PDO
    */
    public function commonDb()
    {
        return $this->commonDbh;
    }

    /**
     * @return \PDO
    */
    public function logDb()
    {
        return $this->logDbh;
    }

    /**
     * @return \PDO
    */
    public function playerDb()
    {
        return $this->playerDbh;
    }
}