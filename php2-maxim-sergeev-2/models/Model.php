<?php

namespace app\models;

use app\services\Db;
use app\interfaces\IModel;

abstract class Model implements IModel

{
    protected $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function getId(int $id): Model
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
//        return $this->db->queryOne($sql);
        return $this->db->queryOne($sql);
    }

    public function getAll(): array
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }


    public function cartDeleteItemSession($id): int
    {
        unset($_SESSION["cart"][$id]);
    }
}

//abstract class Model
//{
//    protected $db;
//
//    public function __construct()
//    {
//        $this->db = new Db();
//    }
//
//    public function getId(int $id): Model
//    {
//        $tableName = $this->getTableName();
//        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
////        return $this->db->queryOne($sql);
//        return $this->db->queryOne($sql);
//    }
//
//    public function getAll(): array
//    {
//        $tableName = $this->getTableName();
//        $sql = "SELECT * FROM {$tableName}";
//        return $this->db->queryAll($sql);
//    }
//
//
//    public function cartDeleteItemSession($id): int
//    {
//        unset($_SESSION["cart"][$id]);
//    }
//
////    abstract public function getTableName(): string;
//}