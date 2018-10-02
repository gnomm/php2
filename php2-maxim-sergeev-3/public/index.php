<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "services/Autoloader.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);


$product = new  \app\models\Product();
var_dump($product);
$product->getInsert(
    $product->getProduct(
        NULL, "1", "1", "1", "testName", "testFoto", "testDes",
        "testMaterial", "testBy", "0", date("Y-m-d H:i:s"), "478", "1"
    )
);

$product->getUpdate(
    $product->getProduct(94,2, "2","2","update","updateFoto",
        "updateDes","uo","Russia","3",date("Y-m-d H:i:s"),300000, "7")
);

$product->getUpdateProductView(14);

//var_dump($product->getOne(14));
//var_dump($product->getAll());

$product->getDelete(22);




$newUser = new \app\models\User();
$newUser->getInsert(
    $newUser->getUser(NULL, "Ura","123")
);

$newUser->getUpdate(
    $newUser->getUpdateUser(70, "tttt","ttt")
);






