<?php
// models/Employee.php
session_start();

class Employee {
    private $employees;

    public function __construct() {
        if (!isset($_SESSION['employees'])) {
            $_SESSION['employees'] = [];
        }
        $this->employees = &$_SESSION['employees'];
    }

    // Thêm nhân viên (thêm tham số allowance)
    public function addEmployee($name, $birthDate, $gender, $type, $absentDays, $salary, $joinDate = '', $salaryFactor = 0, $products = 0, $overtime = 0, $allowance = 0) {
        $id = count($this->employees) + 1;
        $employee = [
            'id' => $id,
            'name' => $name,
            'birthDate' => $birthDate,
            'gender' => $gender,
            'type' => $type,
            'absentDays' => $absentDays,
            'salary' => $salary,
            'joinDate' => $joinDate ?: date('d/m/Y'),
            'salaryFactor' => $salaryFactor ?: 1,
            'products' => $products,
            'overtime' => $overtime,
            'allowance' => $allowance, // Thêm tiền trợ cấp
        ];
        $employee['netSalary'] = $this->calculateNetSalary($employee);
        $this->employees[] = $employee;
        return true;
    }

    // Lấy tất cả nhân viên
    public function getAllEmployees() {
        return $this->employees;
    }

    // Tính thực lĩnh (cộng thêm tiền trợ cấp)
    private function calculateNetSalary($employee) {
        $baseSalary = $employee['salary'];
        $allowance = $employee['allowance']; // Lấy tiền trợ cấp
        if ($employee['type'] === 'vanphong') {
            // Nhân viên văn phòng: Thực lĩnh = Tiền lương - (Số ngày vắng * 200,000) + Tiền trợ cấp
            return $baseSalary - ($employee['absentDays'] * 200000) + $allowance;
        } else {
            // Nhân viên sản xuất: Thực lĩnh = Tiền lương + (Số sản phẩm * 10,000) + (Tăng ca * 150,000) + Tiền trợ cấp
            return $baseSalary + ($employee['products'] * 10000) + ($employee['overtime'] * 150000) + $allowance;
        }
    }
}
?>