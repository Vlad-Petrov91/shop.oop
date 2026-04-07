<?php

namespace app\models;

use app\engine\App;
use app\interfaces\IRepository;
use app\models\entities\Product;
use app\models\repositories\ProductRepository;

abstract class Repository implements IRepository
{

    protected abstract function getTableName();
    protected abstract function getEntityClass();

    public function getWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :value";
        return App::call()->db->queryOneObject($sql, ['value' => $value], $this->getEntityClass());
    }

    public function getWhereAll($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :value";
        return App::call()->db->queryAll($sql, ['value' => $value]);
    }
    public function getWhereLimit($name, $value, int $limit, int $offset = 0)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :value LIMIT :limit, :offset";
        return App::call()->db->queryCategoryLimit($sql, $value, $limit, $offset);
    }

    public function getCountWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT COUNT(id) as `count` FROM `{$tableName}` WHERE {$name} = :value";
        return App::call()->db->queryOne($sql, ['value' => $value])['count'];
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return App::call()->db->queryOne($sql, ['id' => $id]);
    }
    public function getOneObj($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return App::call()->db->queryOneObject($sql, ['id' => $id], $this->getEntityClass());
    }
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return App::call()->db->queryAll($sql);
    }
    public function save(Model $model)
    {
        if ($model->isNew()) {
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
        App::call()->db->execute($sql, $params);
        return $this;
    }

    public function update(Model $model)
    {
        $params = [];
        $colums = [];

        foreach ($model->props as $key => $value) {
            if (!$value) continue;
            $params["{$key}"] = $model->$key;
            $colums[] .= "`{$key}` = :$key";
            // $model->props[$key] = false;
        }
        $colums = implode(', ', $colums);
        $params['id'] = $model->id;
        $tableName = $this->getTableName();

        $sql = "UPDATE `{$tableName}` SET {$colums} WHERE `id` = :id";
        App::call()->db->execute($sql, $params);
        return $this;
    }
    public function delete(Model $model)
    {
        $id = $model->id;
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
        return App::call()->db->execute($sql, ['id' => $id]);
    }
    public function getLimit($limit, $offset = 0)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT ?, ?";
        return App::call()->db->queryLimit($sql, $offset, $limit);
    }
    public function getRandomItems($limit)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY RAND() LIMIT ?, ?";
        return App::call()->db->queryLimit($sql, 0, $limit);
    }
}
