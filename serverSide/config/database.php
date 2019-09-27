<?php

class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "guvi";
    private $username = "root";
    private $password = "";
    public $conn;

    public function createDBIFRequired() {
        try {
            $this->conn = new PDO("mysql:host=$this->host", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS $this->db_name";
            // use exec() because no results are returned
            $this->conn->exec($sql);
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
            
            $this->createTableIFRequired();
    }

    private function createTableIFRequired() {
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE TABLE IF NOT EXISTS internDetails (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                userName VARCHAR(30) NOT NULL,
                password VARCHAR(30) NOT NULL,
                email VARCHAR(50) NOT NULL,
                age VARCHAR(3) NOT NULL,
                gender VARCHAR(10) NOT NULL,
                mobileNumber VARCHAR(12) NOT NULL,
                description VARCHAR(200),
                created VARCHAR(20)
                )";
        
            $this->conn->exec($sql);
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
    }
 
    // get the database connection
    public function getConnection(){
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>