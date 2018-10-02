<?php

namespace app\base;

use app\models\repositories\UserRepository;
use app\services\Db;
use app\services\Request;
use app\interfaces\IRenderer;
use app\traits\TSingleton;


/**
 * Class App
 * @package app\base
 * @property Request $request;
 * @property Db $db;
 * @property IRenderer $templateRenderer;
 */
class App
{
    use TSingleton;

    public $config;
    /**
     * @var Storage
     */
    private $components;

    public static function call()
    {
        return static::getInstance();
    }

    public function run($config)
    {
        session_start();
//        var_dump($_SESSION);
        $this->config = $config;
        $this->components = new Storage();

        $user = new UserRepository();
        $user->userLogin();

        $this->runController();

    }

    private function runController()
    {
        $controllerName = $this->request->getControllerName() ?: $this->config['defaultController'];
        $action = $this->request->getActionName();

        $controllerClass = $this->config['controllerNamespace'] . "\\" . ucfirst($controllerName) . "Controller";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass($this->templateRenderer);
            $controller->run($action);
        }
    }

    public function createComponent($name)
    {
        if ($this->config['components'][$name]) {
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if (class_exists($class)) {
                $reflection = new \ReflectionClass($class);
                unset($params['class']);
                return $reflection->newInstanceArgs($params);
            }
            throw new \Exception("Не определен класс компонента");
        }
        throw  new \Exception("Компонент {$name} не описан");
    }

    function __get($name)
    {
        return $this->components->get($name);
    }
}