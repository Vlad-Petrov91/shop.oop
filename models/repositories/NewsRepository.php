<?php

namespace app\models\repositories;

use app\models\entities\News;
use app\models\Repository;

class NewsRepository extends Repository
{
    public function getTableName()
    {
        return 'news';
    }
    protected function getEntityClass()
    {
        return News::class;
    }
}
