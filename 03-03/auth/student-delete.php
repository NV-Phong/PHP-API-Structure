<?php
session_start();
require_once 'students.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (!empty($_GET['id'])) {
    $student_id = $_GET['id'];
    deleteStudent($student_id);
}

header("Location: student-list.php");
exit;
?>