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
            // header("Location: /");
            http_response_code(200); // response.ok = true
            $responce = [
                'status' => 'ok',
                'login' => $login
            ];
        } else {
            http_response_code(401); // response.ok = false
            $responce = [
                'status' => 'error',
                'message' => 'Invalid email or password'
            ];
        }
        echo json_encode($responce, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
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
