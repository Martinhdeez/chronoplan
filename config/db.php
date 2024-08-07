<?php

class DB{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "chronoplan";
    private $conn;

    public function connect(){
        $this->conn = null;
        try{
            $this->conn = new PDO(
                "mysql:
                host = $this->servername;
                dbname = $this->dbname",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        } catch(PDOException $e) {
            echo 'Connection Error: ' .$e->getMessage();
        }
        return $this->conn;
    }

    public function query($sql, $params = []){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt; //boleano
    }

    public function fetch($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}