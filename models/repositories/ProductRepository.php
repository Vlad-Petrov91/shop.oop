<?php

namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Product;
use app\models\Repository;

class ProductRepository extends Repository
{
    public function getTableName()
    {
        return 'products';
    }
    protected function getEntityClass()
    {
        return Product::class;
    }
    public function getCategoryName($id): string
    {
        $sql = "SELECT name FROM `categories` WHERE id = :id";
        return App::call()->db->queryOne($sql, ['id' => $id])['name'];
    }
    public function getCountOfProducts($categoryId = null): int
    {
        $tableName = $this->getTableName();
        $sql = "SELECT COUNT(*) as count FROM `{$tableName}`";
        if ($categoryId !== null) {
            $sql .= " WHERE category_id = :category_id";
        }
        $params = $categoryId !== null ? ['category_id' => $categoryId] : [];
        return App::call()->db->queryOne($sql, $params)['count'];
    }
}
