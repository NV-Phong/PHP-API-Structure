<?php
include 'layout.php';
require_once 'students.php';

$data = array();
$errors = array();
$is_update_action = false;

if (!empty($_GET['id'])) {
    $data = getStudent($_GET['id']);
    if ($data) {
        $is_update_action = true;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data['student_id'] = $_POST['student_id'] ?? '';
    $data['student_name'] = trim($_POST['student_name'] ?? '');
    $data['student_email'] = trim($_POST['student_email'] ?? '');
    
    if (empty($data['student_name'])) {
        $errors['student_name'] = 'Vui lòng nhập họ tên';
    }
    if (empty($data['student_email']) || !filter_var($data['student_email'], FILTER_VALIDATE_EMAIL)) {
        $errors['student_email'] = 'Vui lòng nhập email hợp lệ';
    }
    
    if (empty($errors)) {
        if ($is_update_action) {
            updateStudent($data['student_id'], $data['student_name'], $data['student_email']);
        } else {
            addStudent($data['student_name'], $data['student_email']);
        }
        header('Location: student-list.php');
        exit;
    }
}
?>

<h2><?php echo $is_update_action ? 'Sửa sinh viên' : 'Thêm sinh viên'; ?></h2>
<form method="POST">
    <?php if ($is_update_action): ?>
        <input type="hidden" name="student_id" value="<?php echo $data['id']; ?>">
    <?php endif; ?>
    <div class="form-group">
        <label>Họ tên:</label>
        <input type="text" name="student_name" 
               value="<?php echo htmlspecialchars($data['fullname'] ?? ''); ?>">
        <?php if (isset($errors['student_name'])): ?>
            <span class="error"><?php echo $errors['student_name']; ?></span>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="student_email" 
               value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>">
        <?php if (isset($errors['student_email'])): ?>
            <span class="error"><?php echo $errors['student_email']; ?></span>
        <?php endif; ?>
    </div>
    <button type="submit">Lưu</button>
    <a href="student-list.php" class="btn">Quay lại</a>
</form>
</div>
</body>
</html>