<?php

namespace app\models;

use app\models\DbModel;

class User extends DbModel
{
    protected ?int $id;
    protected ?string $login;
    protected ?string $password;
    protected ?string $hash;
    protected ?string $is_admin;
    protected array $props = [
        'login' => false,
        'password' => false,
        'is_admin' => false,
    ];

    public function __construct($login = null, $password = null, $is_admin = null, $id = null)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->is_admin = $is_admin;
    }
    public static function getTableName()
    {
        return 'users';
    }

    public static function Auth($login, $pass)
    {
        $user = User::getWhere('login', $login);
        if ($user) {
            if (password_verify($pass, $user->password)) {
                $_SESSION['login'] = $login;
                return true;
            }
        }
    }
    public static function isAuth()
    {
        return isset($_SESSION['login']);
    }
    public static function getUserName()
    {
        return $_SESSION['login'] ?? 'Гость';
    }
}
