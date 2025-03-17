<?php
// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST['category_name'] ?? '';
    
    // Chuẩn bị dữ liệu để gửi đến API
    $data = [
        'name' => $category_name
    ];
    
    // Cấu hình request
    $url = 'http://localhost:3000/categories';
    $options = [
        'http' => [
            'header' => "Content-Type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($data),
        ]
    ];
    
    // Tạo context cho request
    $context = stream_context_create($options);
    
    // Gửi request và nhận response
    $result = file_get_contents($url, false, $context);
    
    // Xử lý response
    if ($result === FALSE) {
        $message = "Có lỗi xảy ra khi tạo category!";
    } else {
        $message = "Category đã được tạo thành công!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
    <meta charset="UTF-8">
    <style>
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .message {
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create New Category</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="category_name">Category Name:</label>
                <input type="text" id="category_name" name="category_name" required>
            </div>
            <button type="submit">Create Category</button>
        </form>

        <?php if (isset($message)): ?>
            <div class="message <?php echo $result !== FALSE ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>