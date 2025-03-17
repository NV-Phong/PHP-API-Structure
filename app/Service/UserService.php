<?php
namespace Phong\PhpApiStructure\Service;
use Phong\PhpApiStructure\Model\User;

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
