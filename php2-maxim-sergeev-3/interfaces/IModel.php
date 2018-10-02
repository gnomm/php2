<?php
namespace app\interfaces;
//use app\models\Model;

interface IModel
{
    public function getOne(int $id);

    public function getALL(): array;

    public function getTableName(): string;

//    public function getProduct($id, $brand_id, $category_id, $product_type_id, $name, $foto, $description, $material,
//                               $produced_by, $view, $date, $price, $ID_UUID);

    public function cartDeleteItemSession($id): int;
}
