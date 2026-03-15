<?php

namespace app\models;

use app\models\DbModel;
use app\engine\Db;

class Cart extends DbModel
{
    protected ?int $id;
    protected ?string $item_id;
    protected ?int $count;
    protected ?string $session;
    protected ?int $price;

    protected array $props = [
        'item_id' => false,
        'count' => false,
        'session' => false,
        'price' => false,
    ];

    public function __construct($item_id = null, $session = null, $count = null, $price = null)
    {
        $this->item_id = $item_id;
        $this->session = $session;
        $this->count = $count;
        $this->price = $price;
    }

    public static function getCart($session)
    {

        $sql = "SELECT catalog.id,catalog.name,catalog.price, cart.id AS cartId, cart.count FROM `cart` JOIN `catalog` ON cart.item_id=catalog.id WHERE cart.session = :session";
        return Db::getInstance()->queryAll($sql, ['session' => $session]);
    }
    public static function getCountOfInCart($session)
    {
        $tableName = static::getTableName();
        $sql = "SELECT COUNT(id) as `count` FROM `{$tableName}` WHERE cart.session = :session";
        return Db::getInstance()->queryOne($sql, ['session' => $session])['count'];
    }

    public static function getTableName()
    {
        return 'cart';
    }
}
