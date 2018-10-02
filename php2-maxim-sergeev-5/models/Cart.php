<?php
namespace app\models;

class Cart extends DbModel
{
    public $id;
    public $id_user;
    public $Name;
    public $Color;
    public $Size;
    public $Quantity;
    public $price;
    public $score;

    public static function getTableName(): string {
        return 'cart';
    }
}