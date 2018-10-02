<?php

namespace app\models;


use app\models\entities\DataEntity;

class User extends DataEntity
{
    public $id;
    public $login;
    public $password;


    public function __construct($id = null, $login = null, $password = null)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }
}