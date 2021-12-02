<?php

class Dbh
{
    private $host = "mariadb-service.semestralka:3306";
    private $user = "root";
    private $password = "password-db";
    private $dbName = "Semestralka-db";

    protected function connect () {
        $dsn = 'mariadb:host=' . $this->host . ';dbname=' .  $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    public function
}
