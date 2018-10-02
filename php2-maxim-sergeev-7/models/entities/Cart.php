<?php

namespace app\models\entities;


class Cart extends DataEntity
{
    public $id;
    public $id_user;
    public $name;
    public $size;
    public $quantity;
    public $price;
    public $score;

    public function __construct($id = null, $id_user = null, $name = null, $size = null, $quantity = null,
                                $price = null, $score = null)
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->name = $name;
        $this->size = $size;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->score = $score;
    }
}