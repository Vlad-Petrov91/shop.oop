<?php

namespace app\engine;

use app\interfaces\IRender;

/** @package app\engine */
class Render implements IRender
{
    private $config;

    /**
     * @param array $config 
     * @return void 
     */
    public function __construct($config = [])
    {
        $this->config = $config;
    }

    /**
     * @param mixed $template 
     * @param array $params 
     * @return string|false 
     */
    public function renderTemplate($template, $params = [])
    {
        ob_start();
        extract($params);
        include $this->config['views_dir'] . $template . '.php';
        return ob_get_clean();
    }
}
