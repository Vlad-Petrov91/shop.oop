<?php

namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Cart;
use app\models\Repository;

/** @package app\models\repositories */
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
        $sql = "SELECT products.id,products.name,products.price, products.image, cart.id AS cartId, cart.count FROM `cart` JOIN `products` ON cart.item_id=products.id WHERE cart.session = :session";
        return App::call()->db->queryAll($sql, ['session' => $session]);
    }
}
