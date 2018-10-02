<?php
namespace app\interfaces;
//use app\models\Model;

interface IDbModel
{
    public static function getOne(int $id);

    public static function getALL(): array;

    public static function getTableName(): string;

    public function cartDeleteItemSession($id): int;
}
