<?php

namespace app\models;


class User extends Model
{
    public $id;
    public $login;
    public $password;


    public function getUser($id, $login, $password)
    {
        $getUser = [
            'id' => $this->id = $id,
            'login' => $this->login = $login,
            'password' => $this->password = $password
        ];
        return $getUser;
    }


    public function getUpdateUser($id, $changeNameTo, $changePasswordTo) {
        $getUpdateUser = [
            'id' => $this->id = $id,
            'login' => $this->login = $changeNameTo,
            'password' => $this->password = $changePasswordTo
        ];
        return $getUpdateUser;
    }


    public function getTableName(): string
    {
        return 'users';
    }
}