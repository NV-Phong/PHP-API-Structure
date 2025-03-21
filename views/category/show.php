<!-- ../views/categories/show.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết danh mục</title>
    <meta charset="UTF-8">
    <style>
        .category-details {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .category-details h1 {
            color: #333;
        }
        .category-details p {
            margin: 10px 0;
        }
        .label {
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }
    </style>
</head>
<body>
    <div class="category-details">
        <h1>Chi tiết danh mục</h1>
        <p>
            <span class="label">ID:</span>
            <?php echo htmlspecialchars($category['IDCategory']); ?>
        </p>
        <p>
            <span class="label">Tên danh mục:</span>
            <?php echo htmlspecialchars($category['CategoryName']); ?>
        </p>
        <p>
            <span class="label">Mô tả:</span>
            <?php echo htmlspecialchars($category['CategoryDescription']); ?>
        </p>
    </div>
</body>
</html>