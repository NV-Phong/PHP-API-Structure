<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">CATEGORIES LIST</h1>
    <?php if (!empty($category)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>DESCRIPTION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($category as $categories): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($categories['ID']); ?></td>
                        <td><?php echo htmlspecialchars($categories['Name']); ?></td>
                        <td><?php echo htmlspecialchars($categories['Description']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center;">No categories found.</p>
    <?php endif; ?>
</body>
</html>