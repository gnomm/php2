<?php

namespace app\models;

use app\services\Db;
use app\interfaces\IModel;

abstract class Model implements IModel

{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getOne(int $id)
    {
        $tableName = $this->getTableName();
//        var_dump($sql = "SELECT * FROM {$tableName} WHERE id = :id");
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
//        var_dump($this->db->queryOne($sql, [':id' => $id]));
//        var_dump($this->db);
        return $this->db->queryOne($sql, [':id' => $id]);
    }


    public function getAll(): array
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }


    public function getDelete(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->queryDelete($sql, [':id' => $id]);
    }


    public function getUpdateProductView(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET view = view + 1 WHERE id = :id";
        return $this->db->queryUpdate($sql, [':id' => $id]);
    }


    public function getUpdate($params)
    {
        $tableName = $this->getTableName();
        $keys = '';
        foreach (array_slice($params,1) as $key => $param) {
                $keys .= $key . ' = ' . ':' . $key . ', ';
        }
        $keys = substr($keys, 0, -2);

        $sql = "UPDATE {$tableName} SET {$keys}  WHERE id = :id";
//        var_dump($keys);
//        var_dump($sql);
        return $this->db->queryUpdate($sql, $params);
    }


    public function getInsert($params)
    {
        $tableName = $this->getTableName();
        $keyPar = '';
        $keyVal = '';

        foreach ($params as $key => $param) {
            $keyPar .= "`" . $key . "`" . ", ";
            $keyVal .= ":" . $key . ", ";
        }

        $keyPar = substr($keyPar, 0, -2);
        $keyVal = substr($keyVal, 0, -2);


        $sql = "INSERT INTO {$tableName} ({$keyPar}) VALUES ($keyVal)";
        return $this->db->queryInsert($sql, $params);
    }


    /**
     * ver_1
     */
//    public function getInsertProduct($id, $brand_id, $category_id, $product_type_id, $name, $foto, $description, $material, $produced_by, $view, $date, $price, $ID_UUID)
//    {
//        $tableName = $this->getTableName();
//        $sql = "INSERT INTO {$tableName} (`id`, `brand_id`, `category_id`, `product_type_id`, `name`, `foto`, `description`, `material`, `produced_by`, `view`, `date`, `price`, `ID_UUID`)
//VALUES (:id, :brand_id, :category_id, :product_type_id, :name, :foto, :description, :material, :produced_by, :view, :date, :price, :ID_UUID)";
//
//        return $this->db->queryInsert($sql, [':id' => $id, ':brand_id' => $brand_id, ':category_id' => $category_id,
//            ':product_type_id' => $product_type_id, ':name' => $name, ':foto' => $foto, ':description' => $description,
//            ':material' => $material, ':produced_by' => $produced_by, ':view' => $view, ':date' => $date,
//            ':price' => $price, ':ID_UUID' => $ID_UUID]);
//    }


    public function cartDeleteItemSession($id): int
    {
        unset($_SESSION["cart"][$id]);
    }
}