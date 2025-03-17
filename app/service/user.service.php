<?php
namespace Phong\PhpApiStructure\service;

require_once __DIR__ . '/../../config/database.config.php';
require_once __DIR__ . '/../model/user.model.php';

class UserService
{
    public function getUsers()
    {
        return User::all(); // Lấy tất cả người dùng
    }

    public function addUser($name, $email)
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->save();
        return $user->id;
    }
}
