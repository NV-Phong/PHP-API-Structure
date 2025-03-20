<!DOCTYPE html>
<html>
<head>
    <title>Xếp loại tuyển sinh</title>
    <meta charset="utf-8">
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td, th {
            border: 1px solid gray;
            padding: 8px;
        }
        .result {
            color: #ADDA78;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    // Khởi tạo biến
    $math = $physics = $chemistry = $area = "";
    $total = $rank = $priority = "";
    
    // Xử lý khi form được submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $math = floatval($_POST["math"]);
        $physics = floatval($_POST["physics"]);
        $chemistry = floatval($_POST["chemistry"]);
        $area = $_POST["area"];
        
        // Tính điểm ưu tiên theo khu vực
        switch($area) {
            case "KV1":
            case "KV2":
                $priority = 5;
                break;
            case "KV3":
                $priority = 3;
                break;
            default:
                $priority = 0;
        }
        
        // Tính tổng điểm
        $total = $math + $physics + $chemistry + $priority;
        
        // Xếp loại
        if ($total >= 24) {
            $rank = "Giỏi";
        } elseif ($total >= 21) {
            $rank = "Khá";
        } elseif ($total >= 15) {
            $rank = "Trung bình";
        } else {
            $rank = "Trượt";
        }
    }
    ?>

    <!-- Form nhập liệu -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table>
            <tr>
                <th colspan="2">TRA CỨU KẾT QUẢ TUYỂN SINH</th>
            </tr>
            <tr>
                <td>Điểm Toán:</td>
                <td><input type="number" name="math" min="0" max="10" step="0.1" required 
                          value="<?php echo $math; ?>"></td>
            </tr>
            <tr>
                <td>Điểm Lý:</td>
                <td><input type="number" name="physics" min="0" max="10" step="0.1" required 
                          value="<?php echo $physics; ?>"></td>
            </tr>
            <tr>
                <td>Điểm Hóa:</td>
                <td><input type="number" name="chemistry" min="0" max="10" step="0.1" required 
                          value="<?php echo $chemistry; ?>"></td>
            </tr>
            <tr>
                <td>Khu vực:</td>
                <td>
                    <select name="area" required>
                        <option value="">Chọn khu vực</option>
                        <option value="KV1" <?php if($area=="KV1") echo "selected"; ?>>KV1</option>
                        <option value="KV2" <?php if($area=="KV2") echo "selected"; ?>>KV2</option>
                        <option value="KV3" <?php if($area=="KV3") echo "selected"; ?>>KV3</option>
                        <option value="Other" <?php if($area=="Other") echo "selected"; ?>>Khu Vực Khác</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Tra cứu">
                </td>
            </tr>
        </table>
    </form>

    <!-- Hiển thị kết quả -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<table>";
        echo "<tr><th colspan='2'>KẾT QUẢ</th></tr>";
        echo "<tr><td>Tổng điểm:</td><td class='result'>" . $total . "</td></tr>";
        echo "<tr><td>Điểm ưu tiên:</td><td class='result'>" . $priority . "</td></tr>";
        echo "<tr><td>Xếp loại:</td><td class='result'>" . $rank . "</td></tr>";
        echo "</table>";
    }
    ?>
</body>
</html>