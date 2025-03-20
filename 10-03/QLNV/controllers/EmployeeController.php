<?php
// controllers/EmployeeController.php
require_once 'models/Employee.php';

class EmployeeController {
    private $employeeModel;

    public function __construct() {
        $this->employeeModel = new Employee();
    }

    public function index() {
        $employees = $this->employeeModel->getAllEmployees();
        require_once 'views/employee_list.php';
    }

    public function add($name, $birthDate, $gender, $type, $absentDays, $salary, $joinDate, $salaryFactor, $products, $overtime, $allowance) {
        if ($this->employeeModel->addEmployee($name, $birthDate, $gender, $type, $absentDays, $salary, $joinDate, $salaryFactor, $products, $overtime, $allowance)) {
            header("Location: /");
            exit;
        } else {
            echo "Error adding employee.";
        }
    }
}
?>