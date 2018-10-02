<?php

namespace app\models\repositories;

use app\services\Db;


class RepositoryException extends \Exception {


}


abstract class Repository
{
    protected $db;

    /**
     * Repository constructor.
     * @param $db
     */
    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    /**
     * @param int $id
     * @return static
     */
    public function getOne(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryObject($sql, [':id' => $id], $this->getEntityClass());
    }


    /**
     * @return static[]
     */
    public function getAll(): array
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
//        return Db::getInstance()->queryObjectAll($sql,[],get_called_class());
        return $this->db->queryAll($sql);
    }


    public function delete(DataEntity $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $this->id]);
    }

    public function insert(DataEntity $entity)
    {
        $params = [];
        $columns = [];

        foreach ($entity as $key => $value) {
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

    public function update(DataEntity $entity)
    {
        $params = [];
        $columns = [];
        $id = null;

        var_dump($this);
        foreach ($entity as $key => $value) {
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



    abstract public function getTableName(): string;

    abstract public function getEntityClass(): string;

}