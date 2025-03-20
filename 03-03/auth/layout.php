<?php
session_start();
// Kiểm tra đăng nhập
if (!isset($_SESSION['username']) && !strpos($_SERVER['PHP_SELF'], 'login.php')) {
   header('Location: login.php');
   exit;
}
?>

<!DOCTYPE html>
<html>

<head>
   <title>Student Management System</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         margin: 20px;
      }

      .container {
         max-width: 800px;
         margin: 0 auto;
      }

      .nav {
         margin-bottom: 20px;
      }

      .nav a {
         margin-right: 10px;
      }

      .table {
         width: 100%;
         border-collapse: collapse;
      }

      .table th,
      .table td {
         border: 1px solid #ddd;
         padding: 8px;
      }

      .form-group {
         margin-bottom: 15px;
      }

      .error {
         color: red;
      }

      .success {
         color: green;
      }

      button,
      .btn {
         padding: 5px 10px;
         cursor: pointer;
      }
   </style>
</head>

<body>
   <div class="container">
      <?php if (isset($_SESSION['username'])): ?>
         <div class="nav">
            <span>Chào mừng <?php echo htmlspecialchars($_SESSION['username']); ?> | </span>
            <a href="student-list.php">Danh sách</a>
            <a href="student-add.php">Thêm mới</a>
            <a href="logout.php">Đăng xuất</a>
         </div>
      <?php endif; ?>

      <?php
      // Hiển thị thông báo nếu có
      if (isset($_SESSION['message'])) {
         echo "<p class='" . ($_SESSION['message_type'] ?? 'success') . "'>" .
            htmlspecialchars($_SESSION['message']) . "</p>";
         unset($_SESSION['message']);
         unset($_SESSION['message_type']);
      }
      ?>