<?php
session_start();
session_destroy();
$_SESSION['message'] = 'Đăng xuất thành công!';
header('Location: login.php');
exit;
