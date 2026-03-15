<?php

namespace app\controllers;

class TaskController extends Controller
{

    private function task($n = 3)
    {
        $answer = [];
        for ($i = 0; $i <= $n; $i++) {
            $answer[] = pow(2, $i);
        }
        return $answer;
    }


    public function actionIndex()
    {
        echo $this->render('task', ['answer' => $this->task()]);
    }
}
