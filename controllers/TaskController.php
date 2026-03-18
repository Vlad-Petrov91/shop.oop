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
        echo $this->render('task', $this->task());
    }
}
