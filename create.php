<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
 
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
   
}

form {
    margin-left: 35%;
    margin-top: 10%;
 
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 300px;
}

h2 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    font-size: 14px;
    margin-bottom: 5px;
    color: #555;
}

input[type="text"],
textarea,
input[type="file"] {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="checkbox"] {
    margin-top: 5px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>

<?php include_once('layout/header.php'); ?>
    <?php include_once('layout/header2.php'); ?>
  
<div classname="container">
<form action="actions/create_product.php" method="post" enctype="multipart/form-data">
        <label for="product_id">Product ID:</label>
        <input type="text" id="product_id" name="product_id" required><br>

        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required><br>

        <label for="product_price">Product Price:</label>
        <input type="text" id="product_price" name="product_price" required><br>

        <label for="product_code">Product Code:</label>
        <input type="text" id="product_code" name="product_code" required><br>

        <label for="in_stock">In Stock:</label>
        <input type="checkbox" id="in_stock" name="in_stock"><br>

        <label for="product_discount">Product Discount:</label>
        <input type="text" id="product_discount" name="product_discount"><br>

        <label for="product_size">Product Size:</label>
        <input type="text" id="product_size" name="product_size"><br>

        <label for="product_details">Product Details:</label>
        <textarea id="product_details" name="product_details"></textarea><br>

        <label for="product_image">Product Image:</label>
        <input type="file" id="product_image" name="product_image"><br>

        <button type="submit">Submit</button>
    </form>
</div>
    <?php include_once('layout/footer.php'); ?>
</body>

</html>
