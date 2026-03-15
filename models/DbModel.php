<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModel;
use PDOException;

/** @package app\models */
abstract class DbModel extends Model
{

    protected abstract static function getTableName();

    public static function getWhere($name, $value)
    {
        try {
            $tableName = static::getTableName();
            $sql = "SELECT * FROM {$tableName} WHERE {$name} = :value";
            return Db::getInstance()->queryOneObject($sql, ['value' => $value], static::class);
        } catch (PDOException $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }

    public static function getOne($id)
    {
        try {
            $tableName = static::getTableName();
            $sql = "SELECT * FROM {$tableName} WHERE id = :id";
            return Db::getInstance()->queryOne($sql, ['id' => $id]);
            // return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
        } catch (PDOException $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
    public static function getOneObj($id)
    {
        try {
            $tableName = static::getTableName();
            $sql = "SELECT * FROM {$tableName} WHERE id = :id";
            // return Db::getInstance()->queryOne($sql, ['id' => $id]);
            return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
        } catch (PDOException $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
    public static function getAll()
    {
        try {
            $tableName = static::getTableName();
            $sql = "SELECT * FROM {$tableName}";
            return Db::getInstance()->queryAll($sql);
        } catch (PDOException $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
    public function insert()
    {
        $params = [];
        $colums = [];

        foreach ($this->props as $key => $value) {
            $params[":" . $key] = $this->$key;
            $colums[] = $key;
        }

        $colums = implode(', ', $colums);
        $values = implode(", ", array_keys($params));

        $tableName = $this->getTableName();
        // $params = get_object_vars($this);
        // $caolums = implode(',', array_keys($params));
        // $values = implode(',', array_map(fn($el) => ':' . $el, array_keys($params)));

        $sql = "INSERT INTO `{$tableName}`({$colums}) VALUES ({$values})";
        Db::getInstance()->lastInsert();
        // var_dump($sql);
        // var_dump($params);
        // die();
        // foreach ($this as $key => $value) {
        //     //TODO собрать INSERT  пропустить id
        //     var_dump($key . "=>" . $value);
        // }


        Db::getInstance()->execute($sql, $params);
        // var_dump(Db::getInstance()->lastInsert());
        return $this;
    }
    public function save()
    {
        if (!isset($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function update()
    {
        $params = [];
        $colums = [];

        foreach ($this->props as $key => $value) {
            if (!$value) continue;
            $params["{$key}"] = $this->$key;
            $colums[] .= "`{$key}` = :$key";
            $this->props[$key] = false;
        }

        $colums = implode(', ', $colums);
        $params['id'] = $this->id;

        $tableName = $this->getTableName();

        $sql = "UPDATE `{$tableName}` SET {$colums} WHERE `id` = :id";
        Db::getInstance()->execute($sql, $params);
        return $this;
    }
    public function delete()
    {
        $id = $this->id;
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
        return Db::getInstance()->execute($sql, ['id' => $id]);
    }
    public static function getLimit($limit)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $limit);
    }
}
