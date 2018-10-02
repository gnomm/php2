<?php
/**
 * Created by PhpStorm.
 * User: gnom
 * Date: 25.09.2018
 * Time: 15:53
 */

namespace app\models\repositories;


use app\models\User;

class UserRepository extends Repository
{
    public function getTableName(): string
    {
        return 'users';
    }


    public function getEntityClass(): string
    {
        return User::class;
    }
}