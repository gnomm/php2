<?php

namespace app\services;

class Request
{
    private $controllerName;
    private $actionName;
    private $params;
    private $requestString;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    /** /product/card?id=2 */
    private function parseRequest(){
        $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
        if(preg_match_all($pattern, $this->requestString, $matches)){
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
            $this->params = $_REQUEST;
        }
    }


    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }


}


//
//namespace app\services;
//
//class Request
//{
//    private $controllerName;
//    private $actionName;
//    private $params;
//    private $requestString;
//
//    /**
//     * Request constructor.
//     * @param $controllerName
//     */
//    public function __construct()
//    {
//        $this->requestString = $_SERVER['REQUEST_URI'];
////       var_dump($_SERVER);
//        $this->parseRequest();
//    }
//
//
//    private function parseRequest()
//    {
//        $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
//        if(preg_match_all($pattern, $this->requestString,$matches)){
//            $this->controllerName = $matches['controller'][0];
//            $this->actionName = $matches['action'][0];
//            $this->params = $_REQUEST;
//        }
////        var_dump($matches);
////        var_dump($this->requestString);
//    }
//
//
//    /**
//     * @return mixed
//     */
//    public function getControllerName()
//    {
//        return $this->controllwrName;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getActionName()
//    {
//        return $this->actionName;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getParams()
//    {
//        return $this->params;
//    }
//
//
//}