<?php

namespace app\engine;

use \PDO;

class Db
{
    private string $driver;
    private string $host;
    private string $login;
    private string $password;
    private string $database;
    private string $charset;

    private $connection = null; //PDO

    public function __construct(string $driver, string $host, string $login, string $password, string $database, string $charset)
    {
        $this->driver = $driver;
        $this->host = $host;
        $this->login = $login;
        $this->password = $password;
        $this->database = $database;
        $this->charset = $charset;
    }

    private function getConnection()
    {
        if (is_null($this->connection)) {
            $this->connection = new \PDO(
                $this->prepareDsnString(),
                $this->login,
                $this->password
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    public function lastInsert()
    {
        return $this->getConnection()->lastInsertId();
    }

    private function prepareDsnString()
    {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=%s",
            $this->driver,
            $this->host,
            $this->database,
            $this->charset
        );
    }

    private function query($sql, $params)
    {
        $STH = $this->getConnection()->prepare($sql);
        $STH->execute($params);
        return $STH;
    }

    public function queryOneObject($sql, $params, $class)
    {
        $STH = $this->query($sql, $params);
        $STH->setFetchMode(\PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        return $STH->fetch();
    }

    public function queryOne($sql, $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }
    public function queryLimit($sql, $offset, $limit)
    {
        $STH = $this->getConnection()->prepare($sql);
        $STH->bindValue(1, $offset, PDO::PARAM_INT);
        $STH->bindValue(2, $limit, PDO::PARAM_INT);
        $STH->execute();
        return $STH->fetchAll();
    }

    public function queryCategoryLimit($sql, $category_id, $offset, $limit)
    {
        $STH = $this->getConnection()->prepare($sql);
        $STH->bindValue(':value', $category_id);
        $STH->bindValue(':offset', $offset, PDO::PARAM_INT);
        $STH->bindValue(':limit', $limit, PDO::PARAM_INT);
        $STH->execute();
        return $STH->fetchAll();
    }
    public function execute($sql, $params = [])
    {
        return $this->query($sql, $params)->rowCount();
    }
}
