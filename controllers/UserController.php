<?php

namespace app\controllers;

use app\controllers\Controller;
use app\engine\App;

class UserController extends Controller
{
    public function actionLogin()
    {
        $userRepository = App::call()->userRepository;
        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['password'];
        if ($userRepository->Auth($login, $pass)) {
            header("Location: /");
            exit();
        } else {
            die("Не верный логин или пароль");
        }
    }
    public function actionLogout()
    {
        session_regenerate_id();
        session_destroy();
        header("Location: /");
        exit();
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
