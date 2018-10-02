<?php

namespace app\models;

use app\services\Db;
use app\interfaces\IDbModel;

abstract class DbModel implements IDbModel

{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }


    /**
     * @param int $id
     * @return static
     */
    public static function getOne(int $id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, [':id' => $id], get_called_class());
    }


    public static function getFeturedItems()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY date DESC  limit 8";
        return Db::getInstance()->queryAll($sql);
//        var_dump( Db::getInstance()->queryAll($sql));
    }

    /**
     * @return static[]
     */
    public static function getAll(): array
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
//        return Db::getInstance()->queryObjectAll($sql,[],get_called_class());
        return Db::getInstance()->queryAll($sql);
    }


//    public function getDelete(int $id)
    public function delete()
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $this->id]);
    }


    public function getUpdateProductView(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET view = view + 1 WHERE id = :id";
        return $this->db->queryUpdate($sql, [':id' => $id]);
    }


    public function insert()
    {
        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            /**TODO решшить проблемы со служебнными полями */
            if ($key == 'db') {
                continue;
            }
            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));
        $tableName = static::getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->lastInsertId();
    }

    public function update()
    {
        $params = [];
        $columns = [];
        $id = null;

        var_dump($this);
        foreach ($this as $key => $value) {
            /**TODO решшить проблемы со служебнными полями */
            if ($key == 'db') {
                continue;
            }
            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`" . ' = ' . ":{$key}";
        }

        array_shift($columns);
        $columns = implode(", ", $columns);
//        $id = array_keys($params)[0];
        $tableName = static::getTableName();
//        $sql = "UPDATE {$tableName} SET {$columns} WHERE `id` = {$id}";
                $sql = "UPDATE {$tableName} SET {$columns} WHERE `id` = :id";
        $this->db->execute($sql, $params);
    }


    public function cartDeleteItemSession($id): int
    {
        unset($_SESSION["cart"][$id]);
    }
}