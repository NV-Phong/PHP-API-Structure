<?php
session_start();

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [
        ['id' => 1, 'fullname' => 'Nguyen Van A', 'email' => 'Tructhach@gmail.com'],
        ['id' => 2, 'fullname' => 'Nguyen Van B', 'email' => 'Tructhach@gmail.com'],
        ['id' => 3, 'fullname' => 'Nguyen Van C', 'email' => 'Tructhach@gmail.com']
    ];
}

function getStudentList() {
    return $_SESSION['students'];
}

function getStudent($student_id) {
    foreach ($_SESSION['students'] as $student) {
        if ($student['id'] == $student_id) {
            return $student;
        }
    }
    return null;
}

function addStudent($student_name, $student_email) {
    $new_id = count($_SESSION['students']) + 1;
    $_SESSION['students'][] = [
        'id' => $new_id,
        'fullname' => $student_name,
        'email' => $student_email
    ];
    $_SESSION['message'] = 'Thêm sinh viên thành công!';
}

function updateStudent($student_id, $student_name, $student_email) {
    foreach ($_SESSION['students'] as &$student) {
        if ($student['id'] == $student_id) {
            $student['fullname'] = $student_name;
            $student['email'] = $student_email;
            $_SESSION['message'] = 'Cập nhật sinh viên thành công!';
            break;
        }
    }
}

function deleteStudent($student_id) {
    $_SESSION['students'] = array_filter($_SESSION['students'], function($student) use ($student_id) {
        return $student['id'] != $student_id;
    });
    $_SESSION['students'] = array_values($_SESSION['students']);
    $_SESSION['message'] = 'Xóa sinh viên thành công!';
}
?>