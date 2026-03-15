<?php

namespace app\controllers;

use app\engine\Render;
use app\interfaces\IRender;
use app\models\Cart;
use app\models\User;

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
        return $this->renderTemplate('layouts/main', [
            'menu' => $this->renderTemplate('menu', [
                'auth' => User::isAuth(),
                'user' => User::getUserName(),
                'countOfInCart' => Cart::getCountOfInCart($this->request->getSession()),
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
