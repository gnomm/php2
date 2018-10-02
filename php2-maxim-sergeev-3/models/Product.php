<?php

namespace app\models;

class  Product extends Model
{
    public $id;
    public $brand_id;
    public $category_id;
    public $product_type_id;
    public $name;
    public $foto;
    public $description;
    public $material;
    public $produced_by;
    public $view;
    public $date;
    public $price;
    public $ID_UUID;

//    public function __construct($id, $brand_id, $category_id, $product_type_id, $name, $foto, $description, $material,
//$produced_by, $view, $date, $price, $ID_UUID)
//    {
//        $this->id = $id;
//        $this->brand_id = $brand_id;
//        $this->category_id = $category_id;
//        $this->product_type_id = $product_type_id;
//        $this->name = $name;
//        $this->foto = $foto;
//        $this->description = $description;
//        $this->material = $material;
//        $this->produced_by = $produced_by;
//        $this->view = $view;
//        $this->date = $date;
//        $this->price = $price;
//        $this->ID_UUID = $ID_UUID;
//    }

    public function getProduct($id, $brand_id, $category_id, $product_type_id, $name, $foto, $description, $material,
                               $produced_by, $view, $date, $price, $ID_UUID)
    {
        $getProduct = [
            'id' =>$this->id = $id,
            'brand_id' => $this->brand_id = $brand_id,
            'category_id' => $this->category_id = $category_id,
            'product_type_id' => $this->product_type_id = $product_type_id,
            'name' => $this->name = $name,
            'foto' => $this->foto = $foto,
            'description' => $this->description = $description,
            'material' => $this->material = $material,
            'produced_by' => $this->produced_by = $produced_by,
            'view' => $this->view = $view,
            'date' => $this->date = $date,
            'price' => $this->price = $price,
            'ID_UUID' => $this->ID_UUID = $ID_UUID
        ];
        return $getProduct;
    }

    public function getTableName(): string
    {
        return 'product';
    }
}
