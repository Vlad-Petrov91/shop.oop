<?php

include __DIR__ . "/../engine/Autoload.php";
include __DIR__ . "/../config/config.php";


use app\models\{User, News};
use app\engine\{Autoload, Render, Request, TwigRender};
use app\models\repositories\UserRepository;

//вызываем автозагрузчики
// spl_autoload_register([new Autoload(), 'loadClass']);
require_once '../vendor/autoload.php';

session_start();

try {
    $request = new Request();

    var_dump($_SERVER['REQUEST_URI']);
    var_dump(parse_url($_SERVER['REQUEST_URI']), PHP_URL_PATH);

    $controller = $request->getControllerName() ?: 'product';
    $action = $request->getActionName();

    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controller) . 'Controller';

    if (class_exists($controllerClass)) {
        $render = new Render();

        $controller = new $controllerClass($render, $request);
        $controller->runAction($action);
    } else {
        throw new Exception('Страница не найдена 404');
    }
} catch (PDOException $error) {
    echo "Ошибка БД: " . $error->getMessage();
} catch (Exception $error) {
    echo $error->getMessage();
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
