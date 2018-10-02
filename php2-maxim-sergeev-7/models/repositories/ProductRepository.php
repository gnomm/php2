<?php

namespace app\models\repositories;

use app\models\entities\DataEntity;
use app\models\entities\Product;

class ProductRepository extends Repository
{
    public function getTableName(): string
    {
        return 'product';
    }


    public function getEntityClass(): string
    {
        return Product::class;
    }


    public function getUpdateProductView(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET view = view + 1 WHERE id = :id";
        return $this->db->queryUpdate($sql, [':id' => $id]);
    }


    public function getFeturedItems()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY date DESC  limit 8";
        return $this->db->queryAll($sql);
    }
}