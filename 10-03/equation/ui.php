<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giải Phương Trình Bậc Hai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        #result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Giải Phương Trình Bậc Hai: ax² + bx + c = 0</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="a">Hệ số a:</label>
                <input type="number" step="0.1" name="a" id="a" required>
            </div>
            <div class="form-group">
                <label for="b">Hệ số b:</label>
                <input type="number" step="0.1" name="b" id="b" required>
            </div>
            <div class="form-group">
                <label for="c">Hệ số c:</label>
                <input type="number" step="0.1" name="c" id="c" required>
            </div>
            <button type="submit" name="solve">Giải</button>
        </form>

        <?php
        // Bao gồm các lớp LinearEquation và QuadraticEquation
        include 'linear-equation.php';
        include 'quadratic-equation.php';

        // Xử lý khi người dùng nhấn nút "Giải"
        if (isset($_POST['solve'])) {
            $a = floatval($_POST['a']);
            $b = floatval($_POST['b']);
            $c = floatval($_POST['c']);

            // Tạo đối tượng QuadraticEquation
            $equation = new QuadraticEquation($a, $b, $c);
            $result = $equation->solve();

            echo '<div id="result">';
            if ($result === null) {
                echo "<p>Phương trình vô nghiệm hoặc không hợp lệ.</p>";
            } else {
                echo "<p>Kết quả:</p>";
                echo "<p>x1 = " . $result[0] . "</p>";
                echo "<p>x2 = " . $result[1] . "</p>";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>