<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: student-list.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if ($username && $password === '123') {
        $_SESSION['username'] = $username;
        $_SESSION['message'] = 'Đăng nhập thành công!';
        header('Location: student-list.php');
        exit;
    } else {
        $error = "Tài khoản hoặc mật khẩu không đúng";
    }
}
include 'layout.php';
?>

<h2>Đăng nhập</h2>
<?php if (isset($error)): ?>
    <p class="error"><?php echo $error; ?></p>
<?php endif; ?>
<form method="POST">
    <div class="form-group">
        <label>Tài khoản:</label>
        <input type="text" name="username" required>
    </div>
    <div class="form-group">
        <label>Mật khẩu:</label>
        <input type="password" name="password" required>
    </div>
    <button type="submit">Đăng nhập</button>
</form>
</div>
</body>
</html>