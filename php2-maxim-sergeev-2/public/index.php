<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);



$product = new \app\models\Product();
var_dump($product);


$user = new \app\models\User();
var_dump($user);

$cart = new \app\models\Cart();
var_dump($cart);