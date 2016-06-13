<?php

/**
 * Created by PhpStorm.
 * User: jonat
 * Date: 12/06/2016
 * Time: 21:37
 */
class ThatchDb
{
    public $host, $dbname, $user, $pass, $charset, $pdo;

    public function __construct($host = null, $dbname = null, $user = null, $pass = null, $charset = null)
    {
        $this->host = HOST;
        $this->dbname = DBNAME;
        $this->user = DBUSER;
        $this->pass = DBPASS;
        $this->charset = 'utf8';
        
        $this->connect();
    }
    
    final protected function connect()
    {
        $pdoconf = "mysql:host={$this->host};";
        $pdoconf .= "dbname={$this->dbname};";
        $pdoconf .= "charset={$this->charset};";

        try{
            $this->pdo = new PDO($pdoconf, $this->user, $this->pass);

            if(DEVMODE === true){
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }
            unset($this->host);
            unset($this->dbname);
            unset($this->user);
            unset($this->pass);
            unset($this->charset);
        } catch (PDOException $e){
            if (DEVMODE === true){
                echo "Erro".$e->getMessage();
            }
            die();
        }
    }
}