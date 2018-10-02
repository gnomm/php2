<?php

namespace app\services;


class Autoloader
{
    public function loadClass($className)
    {

//        $filename = str_replace(["\\", "/", "app"],
//            [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . ".." ],
//            [$className, $_SERVER['DOCUMENT_ROOT']]); // не стал использовать, данный код, так как на выходе получаем массив и придется еще его перебирать, чтобы получить результат.


        $nameSpace = str_replace("\\", DIRECTORY_SEPARATOR, $className);
        $filename = str_replace(["app", "/"], [$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "..", DIRECTORY_SEPARATOR], $nameSpace) . ".php";

        if (file_exists($filename)) {
            include $filename;
        }
    }
}



//class Autoloader
//{
//    public function loadClass($className)
//    {
////        var_dump($className);
/// //        $filename = str_replace('app', $_SERVER['DOCUMENT_ROOT'] . "/..", $className) . ".php";
////        var_dump($filename);
//        if (file_exists($filename)) {
//            include $filename;
//        }
//    }
//}
