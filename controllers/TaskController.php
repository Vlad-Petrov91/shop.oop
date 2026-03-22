<?php

namespace app\controllers;

use app\models\entities\User;
use app\models\repositories\UserRepository;
use Reflection;
use ReflectionClass;
use ReflectionMethod;

class TaskController extends Controller
{

    private function task($n = 3)
    {
        $user = new UserRepository();
        $ref = new ReflectionMethod(UserRepository::class, 'isAuth');
        var_dump($ref->invoke($user));

        return [];
    }


    public function actionIndex()
    {
        var_dump($_SERVER['REQUEST_URI']);
        var_dump(parse_url($_SERVER['REQUEST_URI']), PHP_URL_PATH);
        echo $this->render('task', $this->task());
    }
}
