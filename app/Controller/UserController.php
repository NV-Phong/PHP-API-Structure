<?php
namespace Phong\PhpApiStructure\Controller;

use Phong\PhpApiStructure\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getUsers(): JsonResponse
    {
        $users = $this->userService->getUsers();
        return new JsonResponse($users);
    }

    public function addUser(Request $request): JsonResponse
    {
        $name = $request->input('Name');
        $email = $request->input('Email');

        // Kiểm tra dữ liệu đầu vào
        if (!$name || !$email) {
            return new JsonResponse(
                ['error' => 'Tên và Email là bắt buộc'],
                400 // Yêu cầu không hợp lệ
            );
        }

        $userId = $this->userService->addUser($name, $email);
        return new JsonResponse([
            'message' => 'Người dùng đã được thêm',
            'id' => $userId
        ], 201); // Tạo thành công
    }
}