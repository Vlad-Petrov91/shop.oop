<?php

namespace app\engine;

use app\traits\TSingletone;
use Exception;

/**
 * Class App
 * @property Request $request
 * @property Render $render
 * @property CartRepository $cartRepository
 * @property UserRepository $usersRepository
 * @property ProductRepository $productRepository
 * @property Db $db
 * @property Session $session
 */
class App
{

    use TSingletone;

    public $config;
    private $components;
    private $controller;
    private $action;


    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage; //паттерн Storage, автоматически создает и хранит экземпляры только необходимых классов в единственном экземпляре
        $this->runController();
    }
    /**
     * @return void 
     * @throws mixed 
     */
    protected function runController()
    {
        $this->controller = $this->request->getControllerName() ?: 'product';
        $this->action = $this->request->getActionName();
        $controllerClass = $this->config['controllers_namespaces'] . ucfirst($this->controller) . 'Controller';
        if (class_exists($controllerClass)) {
            // TODO разобраться с вызовом Render
            // $render = $this->render($this->config);

            $controller = new $controllerClass(new Render($this->config), $this->request);
            $controller->runAction($this->action);
        } else {
            throw new Exception('Страница не найдена 404');
        }
    }

    public function createComponent(string $name)
    {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];

            if (class_exists($class)) {
                unset($params['class']); // удаляем имя класса для прокидывания парамеров из конфига

                $reflection = new \ReflectionClass($class); // создаем объекст класса reflection необходимого класса
                return $reflection->newInstanceArgs($params); // прокидываем и разворачиваем параметры для создания
            } else {
                die("Нет класса компонента");
            }
        } else {
            die("Нет такого компонентa" . $this->config['components'][$name]); //TODO убрать имя комонента
        }
    }

    /** @return static  */
    public static function call()
    {
        return static::getInstance();
    }
    public function __get($name)
    {
        return $this->components->get($name);
    }
}
