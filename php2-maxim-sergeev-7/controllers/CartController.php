<?php

namespace app\controllers;

use app\models\entities\Cart;
use app\models\repositories\CartRepository;

//use app\models\repositories\ProductRepository;
//use app\services\Request;

class CartController extends Controller
{
    public function actionIndex()
    {
        $repository = new CartRepository();
        $getCartProducts = [];
        if (empty($_SESSION["cart"])) {
            $getCartProducts;
        } else {
            foreach ($_SESSION["cart"] as $item) {
                $getCartProducts[] = $item;
            }
        }
        if (isset($_POST["cartDeleteItem"])) {
            $cartDeleteItem = new CartRepository();
            $cartDeleteItem->cartDeleteItem($_POST["cartDeleteItem"]);
            $repository->redirect('/cart');
        }

        if (isset($_POST["cartCheckout"])) {
            foreach ($getCartProducts as $cart) {
                if (isset($_SESSION["id_user"])) {
                    $id_user = $_SESSION["id_user"];
                    $score = $cart[2] * $cart[3];

//                    $repository = new CartRepository();
                    $carts = new Cart();
                    $carts->id_user = $id_user;
                    $carts->name = $cart[0];
                    $carts->size = $cart[1];
                    $carts->quantity = $cart[2];
                    $carts->price = $cart[3];
                    $carts->score = $score;
                    $repository->insert($carts);

                    unset($_SESSION['cart']);
                    $repository->redirect('cart/checkout');
                } else {
                    $id_user = session_id();
                    $score = $cart[2] * $cart[3];

//                    $repository = new CartRepository();
                    $carts = new Cart();
                    $carts->id_user = $id_user;
                    $carts->name = $cart[0];
                    $carts->size = $cart[1];
                    $carts->quantity = $cart[2];
                    $carts->price = $cart[3];
                    $carts->score = $score;
                    $repository->insert($carts);

                    unset($_SESSION['cart']);
                    $repository->redirect('cart/checkout');
                }
            }
        }

        echo($this->render('cart', ["getCartProducts" => $getCartProducts]));
    }

    public function actionCheckout()
    {
        $query = [];

        echo($this->render('checkout/checkout', ["$query"]));
    }
}


