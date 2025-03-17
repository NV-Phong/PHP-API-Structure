<?php
namespace Phong\PhpApiStructure\Service;

use Phong\PhpApiStructure\Model\User;

require_once __DIR__ . '/../../config/database.config.php';

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
