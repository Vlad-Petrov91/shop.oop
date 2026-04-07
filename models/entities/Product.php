<?php

namespace app\models\entities;

use app\models\Model;

class Product extends Model
{
    protected ?int $id;
    protected ?int $category_id;
    protected ?string $name;
    protected ?string $description;
    protected ?string $image;
    protected ?int $price;
    protected ?int $count;

    protected array $props = [
        'name' => false,
        'category_id' => false,
        'description' => false,
        'image' => false,
        'price' => false,
        'count' => false,
    ];

    public function __construct($category_id = null, $name = null, $description = null, $image = null, $price = null, $count = null)
    {
        $this->name = $name;
        $this->category_id = $category_id;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
        $this->count = $count;
    }
}
