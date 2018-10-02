<?php

namespace app\models\repositories;


use app\models\entities\Cart;

class CartRepository extends Repository
{
    public function getTableName(): string
    {
        return 'cart';
    }

    public function getEntityClass(): string
    {
        return Cart::class;
    }


    public function cartDeleteItem($id)
    {
        unset($_SESSION["cart"][$id]);
    }
}



