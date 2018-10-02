<?php

namespace app\models;


class User extends DbModel
{
    public $id;
    public $login;
    public $password;


//    public function getUser($id, $login, $password)
//    {
//        $getUser = [
//            'id' => $this->id = $id,
//            'login' => $this->login = $login,
//            'password' => $this->password = $password
//        ];
//        return $getUser;
//    }

    public function __construct($id = null, $login = null, $password = null)
    {
        parent::__construct();
        $this->id - $id;
        $this->login = $login;
        $this->password = $password;
    }

//    public function getUpdateUser($id, $changeNameTo, $changePasswordTo) {
//        $getUpdateUser = [
//            'id' => $this->id = $id,
//            'login' => $this->login = $changeNameTo,
//            'password' => $this->password = $changePasswordTo
//        ];
//        return $getUpdateUser;
//    }


    public static function getTableName(): string
    {
        return 'users';
    }
}