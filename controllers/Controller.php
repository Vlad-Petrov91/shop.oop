<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Render;
use app\models\repositories\CartRepository;
use app\models\repositories\UserRepository;
use app\engine\Session;
use app\interfaces\IRender;

abstract class Controller
{

    protected $action;
    protected $defaultAction = 'index';
    private $render;

    public function __construct(IRender $render)
    {
        $this->render = $render;
    }

    public function runAction($action)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            die('404 нет такого экшена');
        }
    }

    public function render($template, $params = [])
    {
        return $this->renderTemplate('layouts/main', [
            'menu' => $this->renderTemplate('menu', [
                'auth' => App::call()->userRepository->isAuth(),
                'user' => App::call()->userRepository->getUserName(),
                'countOfInCart' => App::call()->cartRepository->getCountWhere('session', App::call()->session->getId()),
                'pageName' => App::call()->request->getPageName(),
                'page' => '1',
            ]),
            'content' => $this->renderTemplate($template, $params)
        ]);
    }

    private function renderTemplate($template, $params = [])
    {
        return $this->render->renderTemplate($template, $params);
    }
}
