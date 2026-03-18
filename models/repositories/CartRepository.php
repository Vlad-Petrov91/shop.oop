<?php

namespace app\models\repositories;

use app\engine\Db;
use app\models\entities\Cart;
use app\models\Repository;

class CartRepository extends Repository
{
    public function getTableName()
    {
        return 'cart';
    }
    protected function getEntityClass()
    {
        return Cart::class;
    }
    public function getCart($session)
    {
        $sql = "SELECT catalog.id,catalog.name,catalog.price, cart.id AS cartId, cart.count FROM `cart` JOIN `catalog` ON cart.item_id=catalog.id WHERE cart.session = :session";
        return Db::getInstance()->queryAll($sql, ['session' => $session]);
    }
}
