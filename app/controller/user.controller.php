<?php
require_once __DIR__ . '/../service/user.service.php';

class UserController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function getUsers()
    {
        $users = $this->userService->getUsers();
        header('Content-Type: application/json');
        echo json_encode($users);
    }

    public function getWorkSpaces()
    {
        $workspaces = $this->userService->getWorkSpaces();
        header('Content-Type: application/json');
        echo json_encode($workspaces);
    }
}
