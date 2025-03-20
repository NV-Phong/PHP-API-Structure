<?php
include 'layout.php';
require_once 'students.php';
$students = getStudentList();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 15px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        th {
            background-color: #f5f5f5;
            color: #555;
            font-weight: bold;
        }
        tr:hover {
            background-color: #fafafa;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-right: 5px;
            text-decoration: none;
            color: #666;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .btn:hover {
            background-color: #f0f0f0;
            color: #333;
        }
        .btn-delete {
            border-color: #ccc;
        }
        .btn-delete:hover {
            background-color: #f8f8f8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Danh sách sinh viên</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Thao tác</th>
            </tr>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student['id']; ?></td>
                <td><?php echo htmlspecialchars($student['fullname']); ?></td>
                <td><?php echo htmlspecialchars($student['email']); ?></td>
                <td>
                    <a href="student-add.php?id=<?php echo $student['id']; ?>" class="btn">Sửa</a>
                    <a href="student-delete.php?id=<?php echo $student['id']; ?>" 
                       class="btn btn-delete" 
                       onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>