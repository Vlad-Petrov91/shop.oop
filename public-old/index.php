<?php

class Db
{
    public $pdo;
    public $host = 'mysql';
    public $dbname = 'shop';
    public $username = 'root';
    public $password = 'root';


    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);

            // Set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connected successfully";
        } catch (PDOException $e) {
            // Handle connection errors
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($id, $dbname)
    {
        // $stmt = $this->pdo->prepare("SELECT * FROM {$dbname} * WHERE `id` = ?");
        $sql = "SELECT * FROM `users` WHERE 1";
        $stmt = $this->pdo->prepare($sql);
        // var_dump($stmt);
        // die();
        $stmt->execute();
        foreach ($stmt as $row) {
            var_dump($row);
            echo "<br>";
        }
    }
}

var_dump((new Db)->query(1, 'users'));
