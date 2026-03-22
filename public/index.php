<?php

require_once '../vendor/autoload.php';

use app\engine\App;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = require_once __DIR__ . "/../config/config.php";

session_start();

try {
    App::call()->run($config);
} catch (PDOException $error) {
    echo "Ошибка БД: " . $error->getMessage();
} catch (Exception $error) {
    echo $error->getMessage();
}
