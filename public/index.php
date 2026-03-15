<?php

include __DIR__ . "/../engine/Autoload.php";
include __DIR__ . "/../config/config.php";


use app\models\{User, News};
use app\engine\{Autoload, Render, Request, TwigRender};

//вызываем автозагрузчики
spl_autoload_register([new Autoload(), 'loadClass']);
require_once '../vendor/autoload.php';

session_start();

$request = new Request();

$controller = $request->getControllerName() ?: 'product';
$action = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controller) . 'Controller';

if (class_exists($controllerClass)) {
    $render = new Render();

    $controller = new $controllerClass($render, $request);
    $controller->runAction($action);
} else {
    die("Нет такого контроллера");
}

// try {
//     $pdo_db = new DB();
//     $stmt = $pdo_db->pdo->prepare("SELECT * FROM `users` WHERE id = 1");
//     $stmt->execute();
//     $user = $stmt->fetch();
//     print_r($user);
// } catch (PDOException $e) {
//     echo "Ошибка: " . $e->getMessage();
// }

// $user1 = (new User('Kreker', 321))->insert();
// var_dump((new News())->getAll());
// var_dump($user->getAll());
