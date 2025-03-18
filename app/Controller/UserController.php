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
        return new JsonResponse([
            'message' => 'Danh sách người dùng',
            'data' => $users
        ], 200);
    }

    public function addUser(Request $request): JsonResponse
    {
        try {
            $userId = $this->userService->addUser($request); // Truyền trực tiếp Request
            return new JsonResponse([
                'message' => 'Người dùng đã được thêm thành công',
                'id' => $userId
            ], 201);
        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => 'Không thể thêm người dùng',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}