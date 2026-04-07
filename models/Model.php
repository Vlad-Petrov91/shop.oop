<?php

namespace app\models;

use Exception;

abstract class Model
{
    protected array $props = [];

    public function __set($name, $value)
    {
        if (isset($this->props[$name])) {
            $this->props[$name] = true;
            $this->$name = $value;
        } else {
            throw new Exception('Свойство set отсутствует');
        }
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } else {
            throw new Exception('Свойство get отсутствует');
        }
    }

    public function isNew(): bool
    {
        return !isset($this->id);
    }
}
