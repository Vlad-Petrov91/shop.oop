<?php

namespace app\controllers;

use app\controllers\Controller;
use app\models\User;

class UserController extends Controller
{
    public function actionLogin()
    {
        $login = $_POST['login'];
        $pass = $_POST['password'];
        if (User::Auth($login, $pass)) {
            header("Location: /");
            die();
        } else {
            die("Не верный логин или пароль");
        }
    }
    public function actionLogout()
    {
        session_regenerate_id();
        session_destroy();
        header("Location: /");
        die();
    }

    public function actionRegistration()
    {
        if (isset($_POST['login'])) {
        }
        echo $this->render('user/registration', [
            'title' => "Регистрация",
        ]);
    }
}
