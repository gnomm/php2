<?php

namespace app\controllers;

use app\base\App;
use app\models\Product;
use app\models\repositories\ProductRepository;
use app\models\repositories\RepositoryException;


class ProductController extends Controller
{
    public function actionIndex()
    {

        try {
            $index = (new ProductRepository())->getFeturedItems();
        } catch (\PDOException $e) {
            echo($this->render('404', []));
        }
        echo($this->render('index', ['index' => $index]));
    }


    public function actionProduct()
    {
        try {
            $product = (new ProductRepository())->getAll();
        } catch (\PDOException $e) {
            echo($this->render('404', []));
        }
        echo($this->render('product', ['product' => $product]));
    }


    public function actionCard()
    {
        $id = App::call()->request->getParams('id');

        try {
            $product = (new ProductRepository())->getOne($id);
        } catch (\PDOException $e) {
            echo($this->render('404', []));
        } catch (\Exception $e) {
            echo "произошла ошибка";
            exit;
        }

        if (!$product) {
            echo($this->render('404'));
            throw new \Exception('Продукт не найден');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $size = $_POST["size"];
            $quantity = $_POST["quantity"];
            $name = $product->name;
            $price = $product->price;

            $_SESSION["cart"][$id] = [
                $name,
                $size,
                $quantity,
                $price,
                $id
            ];

        }
        echo($this->render('single_page', ['product' => $product]));
    }
}