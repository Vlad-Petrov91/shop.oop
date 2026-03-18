<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IRepository;

abstract class Repository implements IRepository
{

    protected abstract function getTableName();
    protected abstract function getEntityClass();

    public function getWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :value";
        return Db::getInstance()->queryOneObject($sql, ['value' => $value], $this->getEntityClass());
    }

    public function getCountWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT COUNT(id) as `count` FROM `{$tableName}` WHERE {$name} = :value";
        return Db::getInstance()->queryOne($sql, ['value' => $value])['count'];
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ['id' => $id]);
        // return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }
    public function getOneObj($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        // return Db::getInstance()->queryOne($sql, ['id' => $id]);
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], $this->getEntityClass());
    }
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }
    public function save(Model $model)
    {
        if (!isset($model->id)) {
            $this->insert($model);
        } else {
            $this->update($model);
        }
    }

    public function insert(Model $model)
    {
        $params = [];
        $colums = [];
        foreach ($model->props as $key => $value) {
            $params[":" . $key] = $model->$key;
            $colums[] = $key;
        }

        $colums = implode(', ', $colums);
        $values = implode(", ", array_keys($params));

        $tableName = $this->getTableName();
        // $params = get_object_vars($this);
        // $caolums = implode(',', array_keys($params));
        // $values = implode(',', array_map(fn($el) => ':' . $el, array_keys($params)));

        $sql = "INSERT INTO `{$tableName}`({$colums}) VALUES ({$values})";
        // Db::getInstance()->lastInsert();
        // var_dump($sql);
        // var_dump($params);
        // die();
        // foreach ($this as $key => $value) {
        //     //TODO собрать INSERT  пропустить id
        //     var_dump($key . "=>" . $value);
        // }
        Db::getInstance()->execute($sql, $params);
        return $this;
    }

    public function update(Model $model)
    {
        $params = [];
        $colums = [];

        foreach ($model->props as $key => $value) {
            if (!$value) continue;
            $params["{$key}"] = $this->$key;
            $colums[] .= "`{$key}` = :$key";
            $model->props[$key] = false;
        }

        $colums = implode(', ', $colums);
        $params['id'] = $model->id;

        $tableName = $this->getTableName();

        $sql = "UPDATE `{$tableName}` SET {$colums} WHERE `id` = :id";
        Db::getInstance()->execute($sql, $params);
        return $this;
    }
    public function delete(Model $model)
    {
        $id = $model->id;
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
        return Db::getInstance()->execute($sql, ['id' => $id]);
    }
    public function getLimit($limit)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $limit);
    }
}
