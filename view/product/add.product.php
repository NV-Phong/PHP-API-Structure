<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body>
    <h1 style="text-align: center;">CREATE NEW PRODUCT</h1>
    
    <form action="http://localhost:3000/products" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" required></textarea><br><br>
        <label for="description">categories:</label><br>
        <textarea id="category" name="description" rows="4" required></textarea><br><br>
        
        <!-- <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br> -->
        
        <label for="price">Price ($):</label><br>
        <input type="number" id="price" name="price" step="0.01" min="0" required><br><br>
        
        <button type="submit">Create Product</button>
    </form>
</body>
</html>
