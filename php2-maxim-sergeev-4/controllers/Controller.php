<?php

namespace app\controllers;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;


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

    public function render($template, $params = [])
    {
        if ($this->useLayout) {
            $content = $this->renderTemplate($template, $params);
            return $this->renderTemplate("layout/{$this->layout}", ['content' => $content]);
        }
        return $this->$this->renderTemplate($template, $params);
    }

    public function renderTemplate($template, $params = [])
    {
        ob_start();
        extract($params);
        $templatePath = TEMPLATES_DIR . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}

