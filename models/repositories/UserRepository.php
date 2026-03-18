<?php

namespace app\models\repositories;

use app\engine\Session;
use app\models\entities\User;
use app\models\Repository;

class UserRepository extends Repository
{
    public function Auth($login, $pass)
    {
        $user = $this->getWhere('login', $login);
        if ($user) {
            if (password_verify($pass, $user->password)) {
                $session = new Session();
                $session->set('login', $login);
                return true;
            }
        }
    }
    public function isAuth()
    {
        return isset($_SESSION['login']);
    }
    public function getUserName()
    {
        return $_SESSION['login'] ?? 'Гость';
    }
    public function getTableName()
    {
        return 'users';
    }

    protected function getEntityClass()
    {
        return User::class;
    }
}
