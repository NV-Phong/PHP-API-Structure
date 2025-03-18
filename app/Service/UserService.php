<?php
namespace Phong\PhpApiStructure\Service;

use Phong\PhpApiStructure\Model\User;
use Illuminate\Http\Request;

class UserService
{
    public function getUsers()
    {
        return User::where('IsDeleted', false)->get();
    }

    public function addUser(Request $request)
    {
        $user = User::create([
            'UserName' => $request->input('UserName', ''),
            'Email' => $request->input('Email', ''),
            'PhoneNumber' => $request->input('PhoneNumber'), // Lấy từ request, mặc định là chuỗi rỗng
            'IsDeleted' => $request->input('IsDeleted', false)
        ]);
        
        return $user->IDUser;
    }
}