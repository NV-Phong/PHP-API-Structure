<?php
namespace Phong\PhpApiStructure\Controller;
use Phong\PhpApiStructure\Service\UserService;

class UserController
{
    private $userService;

    public function __construct(UserService $userService = null)
    {
        $this->userService = $userService ?? new UserService();
    }

    public function getUsers()
    {
        $users = $this->userService->getUsers();
        header('Content-Type: application/json');
        echo json_encode($users);
    }

    public function addUser()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $name = $data['Name'];
        $email = $data['Email'];

        $userId = $this->userService->addUser($name, $email);
        header('Content-Type: application/json');
        echo json_encode(['message' => 'User added', 'id' => $userId]);
    }
}
