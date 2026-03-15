<?php

namespace app\engine;

//класс автозагрузчик, при создании эекземпляра класса автоматически передает namespase в функцию,
//которая составлет абсолютный путь к файлу класса класса заменяя слеши и префикс namespace

class Autoload
{
    public function loadClass($className)
    {
        $path = ROOT . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        $fileName = str_replace('/app', '', $path);
        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}
