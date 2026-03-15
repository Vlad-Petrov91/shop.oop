<?php

namespace app\models;

use app\models\DbModel;

class News extends DbModel
{
    public ?int $id;
    public ?string $title;
    public ?string $content;

    public function __construct($title = null, $content = null)
    {
        $this->title = $title;
        $this->content = $content;
    }
    public static function getTableName()
    {
        return 'news';
    }
}
