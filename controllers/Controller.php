<?php

namespace app\controllers;

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
    protected $request;

    public function __construct(IRender $render, $request)
    {
        $this->render = $render;
        $this->request = $request;
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
        $user = new UserRepository();
        $cart = new CartRepository();
        $session = new Session();
        return $this->renderTemplate('layouts/main', [
            'menu' => $this->renderTemplate('menu', [
                'auth' => $user->isAuth(),
                'user' => $user->getUserName(),
                'countOfInCart' => $cart->getCountWhere('session', $session->getId()),
                'page' => $this->request->getPageName(),
            ]),
            'content' => $this->renderTemplate($template, $params)
        ]);
    }

    private function renderTemplate($template, $params = [])
    {
        return $this->render->renderTemplate($template, $params);
    }
}
