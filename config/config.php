<?php

use app\engine\Db;
use app\engine\Render;
use app\engine\Request;
use app\engine\Session;
use app\models\repositories\CartRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\UserRepository;

return [
    'root' => dirname(__DIR__),
    'controllers_namespaces' => 'app\controllers\\',
    'views_dir' => '../views/',
    'components' =>
    [
        'db' => [
            'class' => Db::class,
            'driver' => $_ENV['DB_DRIVER'],
            'host' => $_ENV['DB_HOST'],
            'login' => $_ENV['DB_LOGIN'],
            'password' => $_ENV['DB_PASSWORD'],
            'database' => $_ENV['DB_NAME'],
            'charset' => $_ENV['DB_CHARSET'],
        ],
        'userRepository' => [
            'class' => UserRepository::class,
        ],
        'request' => [
            'class' => Request::class,
        ],
        'productRepository' => [
            'class' => ProductRepository::class,
        ],
        'render' => [
            'class' => Render::class,
        ],
        'session' => [
            'class' => Session::class,
        ],
        'cartRepository' => [
            'class' => CartRepository::class,
        ],
    ]
];
