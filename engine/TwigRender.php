<?php

namespace app\engine;

use app\interfaces\IRender;

class TwigRender implements IRender
{

    private $twig;
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../views/twig');
        $this->twig = new \Twig\Environment($loader, [
            'debug' => true,
        ]);
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
    }

    public function renderTemplate($template, $params = [])
    {
        $template .= '.twig';
        return $this->twig->render($template, $params);
    }
}
