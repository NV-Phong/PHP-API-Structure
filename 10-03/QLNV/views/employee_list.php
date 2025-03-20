<!-- views/employee_list.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            margin-top: 30px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2c3e50;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }
        h2 {
            color: #34495e;
            margin-top: 40px;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }
        .form-label {
            font-weight: 600;
            color: #2c3e50;
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        .table {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        .table thead {
            background-color: #3498db;
            color: #fff;
        }
        .table th, .table td {
            padding: 12px;
            vertical-align: middle;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .alert-info {
            background-color: #e7f3fe;
            border-color: #b6d4fe;
            color: #31708f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-users me-2"></i>QUẢN LÝ NHÂN VIÊN</h1>
        
        <!-- Form nhập liệu -->
        <form action="/?action=add" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Họ và tên:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Ngày sinh:</label>
                    <input type="text" class="form-control" name="birthDate" placeholder="dd/mm/yyyy" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Giới tính:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Nam" required>
                        <label class="form-check-label">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Nữ">
                        <label class="form-check-label">Nữ</label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Loại nhân viên:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" value="vanphong" required>
                        <label class="form-check-label">Văn phòng</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" value="sanxuat">
                        <label class="form-check-label">Sản xuất</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Số ngày vắng:</label>
                    <input type="number" class="form-control" name="absentDays" min="0" value="0" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tiền lương:</label>
                    <input type="number" class="form-control" name="salary" min="0" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Ngày vào làm:</label>
                    <input type="text" class="form-control" name="joinDate" placeholder="dd/mm/yyyy">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Hệ số lương:</label>
                    <input type="number" class="form-control" name="salaryFactor" step="0.1" min="0" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Số sản phẩm:</label>
                    <input type="number" class="form-control" name="products" min="0" value="0">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tăng ca:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="overtime" value="0" checked>
                        <label class="form-check-label">Không</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="overtime" value="1">
                        <label class="form-check-label">Có</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tiền trợ cấp:</label>
                    <input type="number" class="form-control" name="allowance" min="0" value="0">
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-calculator me-2"></i>Tính lương</button>
        </form>

        <!-- Danh sách nhân viên -->
        <h2>Danh sách nhân viên</h2>
        <?php if (empty($employees)): ?>
            <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle me-2"></i>Chưa có nhân viên nào.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Họ và tên</th>
                            <th>Số cơn</th>
                            <th>Ngày vào làm</th>
                            <th>Hệ số lương</th>
                            <th>Loại nhân viên</th>
                            <th>Số ngày vắng</th>
                            <th>Số sản phẩm</th>
                            <th>Tăng ca</th>
                            <th>Tiền trợ cấp</th>
                            <th>Tiền lương</th>
                            <th>Thực lĩnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($employee['name']); ?></td>
                            <td><?php echo htmlspecialchars($employee['id']); ?></td>
                            <td><?php echo htmlspecialchars($employee['joinDate']); ?></td>
                            <td><?php echo htmlspecialchars($employee['salaryFactor']); ?></td>
                            <td><?php echo $employee['type'] === 'vanphong' ? 'Văn phòng' : 'Sản xuất'; ?></td>
                            <td><?php echo htmlspecialchars($employee['absentDays']); ?></td>
                            <td><?php echo htmlspecialchars($employee['products']); ?></td>
                            <td><?php echo $employee['overtime'] ? 'Có' : 'Không'; ?></td>
                            <td><?php echo number_format($employee['allowance']) . ' đồng'; ?></td>
                            <td><?php echo number_format($employee['salary']) . ' đồng'; ?></td>
                            <td><?php echo number_format($employee['netSalary']) . ' đồng'; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>