<?php

namespace app\services;

use app\traits\TSingleton;

class Db
{
    use TSingleton;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'brand',
        'charset' => 'utf8'
    ];

    private $conn = null;


    private function getConnection()
    {
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->conn;
    }


    public function queryOne($sql, $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }


    public function queryObject($sql, $params = [], $class)
    {
        $smtp = $this->query($sql, $params);
        $smtp->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        return $smtp->fetch();
    }

//    public  function queryObjectAll($sql, $params = [], $class) {
//        $smtp = $this->query($sql, $params);
//        $smtp->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
//        return $smtp->fetchAll();
//    }

    public function lastInsertId()
    {
        return $this->getConnection()->lastInsertId();
    }


    public function execute($sql, $params = [])
    {
        $this->query($sql, $params);
        return true;
    }

    //SELECT * FROM products WHERE id = :id    // [':id' => 5]
    private function query($sql, $params)
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
//        $pdoStatement->bindValue("id", $params['id']);
        $pdoStatement->execute($params);

        return $pdoStatement;
    }

    private function prepareDsnString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }
}