<?php

namespace app\models\entities;

use app\models\Model;

class News extends Model
{
    public ?int $id;
    public ?string $title;
    public ?string $content;

    public function __construct($title = null, $content = null)
    {
        $this->title = $title;
        $this->content = $content;
    }
}
