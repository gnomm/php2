<?php

namespace app\controllers;

use app\services\TemplateRenderer;
use app\interfaces\IRenderer;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;
    private $renderer;

    /**
     * Controller constructor.
     * @param $renderer
     */
    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }


    public function run($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
//        var_dump("action" . ucfirst($this->action));

        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
//            var_dump($this->$method());
        } else {
            echo "404";
        }
    }


    protected function render($template, $params = [])
    {
        if ($this->useLayout) {
            $content = $this->renderTemplate($template, $params);
            return $this->renderTemplate("layout/{$this->layout}", ['content' => $content]);
        }
        return $this->$this->renderTemplate($template, $params);
    }


    protected function renderTemplate($template, $params = [])
    {
        return $this->renderer->render($template, $params);
    }
}

