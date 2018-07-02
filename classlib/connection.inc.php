<?php

class Dbh{

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $chartset;

    public function connect(){
        $this->servername = "127.0.0.1";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "customer_db";
        $this->charset = "utf8mb4";
        $this->port = "3307";

    try{
        $dsn = "mysql:host=".$this->servername.";port=".$this->port.";dbname=".$this->dbname.";charset=".$this->charset;
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch (PDOException $e){
        echo "Connection failed: ".$e->getMessage();
    }

    }

}