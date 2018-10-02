<?php

namespace app\models\entities;


class  Product extends DataEntity
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


    /**
     * Product constructor.
     * @param null $id
     * @param null $brand_id
     * @param null $category_id
     * @param null $product_type_id
     * @param null $name
     * @param null $foto
     * @param null $description
     * @param null $material
     * @param null $produced_by
     * @param null $view
     * @param null $date
     * @param null $price
     * @param null $ID_UUID
     */
    public function __construct($id = NULL, $brand_id = NULL, $category_id = NULL, $product_type_id = NULL,
                                $name = NULL, $foto = NULL, $description = NULL, $material = NULL, $produced_by = NULL,
                                $view = NULL, $date = NULL, $price = NULL, $ID_UUID = NULL)
    {
        $this->id = $id;
        $this->brand_id = $brand_id;
        $this->category_id = $category_id;
        $this->product_type_id = $product_type_id;
        $this->name = $name;
        $this->foto = $foto;
        $this->description = $description;
        $this->material = $material;
        $this->produced_by = $produced_by;
        $this->view = $view;
        $this->date = $date;
        $this->price = $price;
        $this->ID_UUID = $ID_UUID;
    }

//    public function getProduct($id, $brand_id, $category_id, $product_type_id, $name, $foto, $description, $material,
//                               $produced_by, $view, $date, $price, $ID_UUID)
//    {
//        $getProduct = [
//            'id' =>$this->id = $id,
//            'brand_id' => $this->brand_id = $brand_id,
//            'category_id' => $this->category_id = $category_id,
//            'product_type_id' => $this->product_type_id = $product_type_id,
//            'name' => $this->name = $name,
//            'foto' => $this->foto = $foto,
//            'description' => $this->description = $description,
//            'material' => $this->material = $material,
//            'produced_by' => $this->produced_by = $produced_by,
//            'view' => $this->view = $view,
//            'date' => $this->date = $date,
//            'price' => $this->price = $price,
//            'ID_UUID' => $this->ID_UUID = $ID_UUID
//        ];
//        return $getProduct;
//    }


}
