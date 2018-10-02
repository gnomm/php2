<?php

namespace app\controllers;

use app\models\Product;
use app\models\repositories\ProductRepository;
use app\models\repositories\RepositoryException;


class ProductController extends Controller
{
    public function actionIndex()
    {
//        $index = (new ProductRepository())->getFeturedItems();
        try {
            $index = (new ProductRepository())->getFeturedItems();
        } catch (\PDOException $e) {
            echo($this->render('404', []));
        }
        echo($this->render('index', ['index' => $index]));
    }

    public function actionProduct()
    {
//        $id = $_GET['id'];
//        $product = Product::getAll();
//        $product = (new ProductRepository())->getAll();
        try {
            $product = (new ProductRepository())->getAll();
        } catch (\PDOException $e) {
            echo($this->render('404', []));
        }
        echo($this->render('product', ['product' => $product]));
    }


    public function actionCard()
    {
        $id = $_GET['id'];
//        $product = Product::getOne($id);
//                    $product = (new ProductRepository())->getOne($id);
        try {
            $product = (new ProductRepository())->getOne($id);

        }
        catch (\PDOException $e) {
            echo($this->render('404', []));
        }
        catch (\Exception $e) {
            echo "произошла ошибка";
            exit;
        }

        if (!$product) {
            echo ($this->render('404'));
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


    public function actionCart()
    {
        $getCartProducts = [];
//        var_dump($_SESSION);
        if (empty($_SESSION["cart"])) {
            $getCartProducts;
        } else {
            foreach ($_SESSION["cart"] as $item) {
                $getCartProducts[] = $item;
            }
        }
        if (isset($_POST["cartDeleteItem"])) {
            cartDeleteItem($_POST["cartDeleteItem"]);
//            redirect("/cart");

        }

        if (isset($_POST["cartCheckout"])) {
            foreach ($getCartProducts as $cart) {
                if (isset($_SESSION["id_user"])) {
                    $id_user = $_SESSION["id_user"];
                    $score = $cart[2] * $cart[3];
                    execute("INSERT INTO `cart` (`id`, `id_user`, `name`, `size`, `quantity`, `price`, `score`)
VALUES (NULL, '{$id_user}', '{$cart[0]}', '{$cart[1]}', '{$cart[2]}', '{$cart[3]}', '{$score}');");
                    session_unset();
//                    redirect("/checkout");
//            redirect("/checkout");
                } else {
                    $id_user = session_id();
                    $score = $cart[2] * $cart[3];
                    execute("INSERT INTO `cart` (`id`, `id_user`, `name`, `size`, `quantity`, `price`, `score`)
VALUES (NULL, '{$id_user}', '{$cart[0]}', '{$cart[1]}', '{$cart[2]}', '{$cart[3]}', '{$score}');");
                    session_unset();
//                    redirect("/checkout");
//            redirectByTime("/index");
                }
            }
        }


        echo($this->render('cart', ["getCartProducts" => $getCartProducts]));
    }


}