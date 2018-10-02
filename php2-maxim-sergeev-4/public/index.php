<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "services/Autoloader.php";

session_start();

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);


$controllerName = $_GET['c'] ?: DEFAULT_CONTROLLER;
$action = $_GET['a'];

$controllerClass = CONTROLLERS_NAMESPACE . "\\" . ucfirst($controllerName) . "Controller";
//var_dump($controllerClass);

if (class_exists($controllerClass)) {
    $controller = new $controllerClass;
    $controller->run($action);
}



//$product = new \app\models\Product();
//$product->brand_id = 1;
//$product->category_id = 1;
//$product->product_type_id = 1;
//$product->name = 'Новое платье';
//$product->foto = "foto";
//$product->description = "описание";
//$product->material = "материал";
//$product->produced_by = "Россия";
//$product->view = 0;
//$product->date = date("Y-m-d H:i:s");
//$product->price = 14000;
//$product->ID_UUID = 1;
//
//$product->insert();
//var_dump($product);


//$new = \app\models\User::getAll();
//var_dump($new);

//$newUser = new \app\models\User();
//$newUser->login = 'testUser';
//$newUser->password = 'password';
//$newUser->insert();
//var_dump($newUser);



//$newUser2 = \app\models\User::getOne(71);
//$newUser2->login = 'use';
//$newUser2->password = 'pas';
//$newUser2->update();
//var_dump($newUser2);



