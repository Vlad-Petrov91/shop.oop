<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\User;
use app\models\repositories\ProductRepository;
use app\models\repositories\UserRepository;
use Reflection;
use ReflectionClass;
use ReflectionMethod;

class TaskController extends Controller
{

    private function task($n = 100)
    {
        // for ($i = 1; $i <= $n; $i++) {
        //     $rep = new ProductRepository();
        //     $params = ['id' => $i];
        //     $sql = "UPDATE `products` SET `image` = 'img_" . $i . ".png' WHERE `id` = :id";
        //     $db = App::call()->db;
        //     $db->execute($sql, $params);
        // }
        $str = 'nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac';
        var_dump(mb_strlen($str));
        var_dump(mb_substr($str, 0, 15));

        exit;
        return $rep;
    }

    public function actionIndex()
    {

        echo $this->render('task', $this->task());
    }
}
