<?php

namespace app\models;

use app\interfaces\IModel;

abstract class Model implements IModel
{
    protected array $props = [];
    public function __set($name, $value)
    {
        if (isset($this->props[$name])) {
            $this->props[$name] = true;
            $this->$name = $value;
        } else {
            var_dump("Свойство отсутствует");
        }
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } else {
            var_dump("Свойство отсутствует");
        }
    }
}
