<?php

namespace app\models\entities;

use app\models\Model;

class User extends Model
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
}
