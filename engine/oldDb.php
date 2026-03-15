<?php

class oldDb
{
    private $host = 'mysql-8.4';
    private $db = 'shop';
    private $user = 'root';
    private $pass = '';
    public $pdo = null; // Свойство для хранения объекта PDO

    // use TSingletone;

    private $connection = null;

    public function getConnection()
    {
        if (is_null($this->connection)) {
            $dsn = "mysql:host=$this->host;dbname=$this->db;charset=utf8mb4"; // MySQL DSN
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Включение режима ошибок
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Режим выборки
                PDO::ATTR_EMULATE_PREPARES => false, // Использование подготовленных запросов
            ];

            try {
                $this->connection = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        return $this->connection;
    }

    public function queryOne()
    {
        return $this->pdo->query();
    }

    public function queryAll()
    {
        return $this->pdo->query();
    }
}

// Использование
// try {
//     $pdo_db = new DB();
//     $stmt = $pdo_db->pdo->prepare("SELECT * FROM users WHERE id = ?");
//     $stmt->execute([1]);
//     $user = $stmt->fetch();
//     print_r($user);
// } catch (PDOException $e) {
//     echo "Ошибка: " . $e->getMessage();
// }
