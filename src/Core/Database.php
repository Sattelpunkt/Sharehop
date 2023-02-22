<?php

namespace Core;

use Config\BaseConfig;
use PDO;
use PDOException;

class Database
{

    private $dsn, $user, $pass;
    private static $db = null;
    private $dbh, $error, $stmt;
    private $options = [
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];


    private function __construct()
    {
        $this->dsn = "mysql:host=" . BaseConfig::$config['Database_Host'] . ";dbname=" . BaseConfig::$config['Database_Name'];
        $this->user = BaseConfig::$config['Database_User'];
        $this->pass = BaseConfig::$config['Database_Password'];


        try {
            $this->dbh = new PDO($this->dsn, $this->user, $this->pass, $this->options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }

    }

    public static function getInstance(): ?Database
    {
        if (self::$db == null) {
            self::$db = new self();
        }
        return self::$db;
    }


    public function __destruct()
    {
        $db = null;
        $dbh = null;
    }

    public function run($sql, $args = null)
    {
        if (!$args) {
            return $this->dbh->query($sql);
        }
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    public function row($stmt)
    {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function col($stmt)
    {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLastInsertID(): bool|string
    {
        return $this->dbh->lastInsertId();
    }
    public function printError(): void {
        print($this->error);
    }
}
