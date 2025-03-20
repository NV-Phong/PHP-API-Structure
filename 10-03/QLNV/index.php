<?php
// index.php
require_once 'controllers/EmployeeController.php';

// Khởi tạo session
session_start();

$controller = new EmployeeController();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $birthDate = $_POST['birthDate'] ?? '';
            $gender = $_POST['gender'] ?? '';
            $type = $_POST['type'] ?? '';
            $absentDays = (int)($_POST['absentDays'] ?? 0);
            $salary = (int)($_POST['salary'] ?? 0);
            $joinDate = $_POST['joinDate'] ?? '';
            $salaryFactor = (float)($_POST['salaryFactor'] ?? 1);
            $products = (int)($_POST['products'] ?? 0);
            $overtime = (int)($_POST['overtime'] ?? 0);
            $allowance = (int)($_POST['allowance'] ?? 0);

            if ($name && $birthDate && $gender && $type && $salary) {
                $controller->add($name, $birthDate, $gender, $type, $absentDays, $salary, $joinDate, $salaryFactor, $products, $overtime, $allowance);
            } else {
                echo "Vui lòng điền đầy đủ thông tin bắt buộc.";
            }
        }
        break;
    case 'index':
    default:
        $controller->index();
        break;
}
?>