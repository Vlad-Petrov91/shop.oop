<?php

namespace app\engine;

class Storage
{
    protected array $items;

    public function set(string $name, object $obj)
    {
        $this->items[$name] = $obj;
    }

    public function get(string $name)
    {
        if (!isset($this->items[$name])) {
            $this->items[$name] =  App::call()->createComponent($name);
        }
        return $this->items[$name];
    }
}
