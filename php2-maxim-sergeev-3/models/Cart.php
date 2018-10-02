<?php
namespace app\models;

class Cart extends Model
{
    public $id;
    public $id_user;
    public $Name;
    public $Color;
    public $Size;
    public $Quantity;
    public $price;
    public $score;

    public function getTableName(): string {
        return 'cart';
    }
}