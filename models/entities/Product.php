<?php

namespace app\models\entities;

use app\models\Model;

class Product extends Model
{
    protected ?int $id;
    protected ?string $name;
    protected ?string $description;
    protected ?string $image;
    protected ?int $price;
    protected ?int $count;

    protected array $props = [
        'name' => false,
        'description' => false,
        'image' => false,
        'price' => false,
        'count' => false,
    ];

    public function __construct($name = null, $description = null, $image = null, $price = null, $count = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
        $this->count = $count;
    }
}
