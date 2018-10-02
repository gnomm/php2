<?php

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


    public function userLogin()
    {
        $repository = new UserRepository();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_POST['login'];
            $pass = $_POST['password'];
            if ($user = $this->getUserByLoginPass($login, $pass)) {
                $_SESSION["login"] = $login;
                $_SESSION["id_user"] = $user['id'];
                $repository->redirect($_SERVER['REQUEST_URI']);
                exit;
            } else {
                $repository->redirect($_SERVER['REQUEST_URI']);
            }
        }
        if (isset($_POST["ExitLogin"])) {
            $this->UserExit();
            $repository->redirect("/");
        }
    }


    public function getUserByLoginPass($login, $pass)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE login = '{$login}' AND password = '{$pass}'";
        return $this->db->queryOne($sql);
    }


    public function UserExit()
    {
        unset($_SESSION['id_user']);
    }
}



