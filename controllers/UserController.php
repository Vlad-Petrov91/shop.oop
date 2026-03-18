<?php

namespace app\controllers;

use app\controllers\Controller;
use app\engine\Request;
use app\models\repositories\UserRepository;
use app\models\User;

class UserController extends Controller
{
    public function actionLogin()
    {
        $user = new UserRepository();
        $login = $this->request->getParams()['login'];
        $pass = $this->request->getParams()['password'];
        if ($user->Auth($login, $pass)) {
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
