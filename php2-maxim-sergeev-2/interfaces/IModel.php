<?php
namespace app\interfaces;
use app\models\Model;

interface IModel
{
    public function getId(int $id): Model;

    public function getALL(): array;

    public function getTableName(): string;

    public function cartDeleteItemSession($id): int;
}
