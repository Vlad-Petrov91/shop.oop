<?php

namespace app\models\entities;

use app\models\Model;

class Cart extends Model
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
}
