<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .product-image {
            height: 300px;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-details {
            padding: 20px;
            text-align: center;
        }

        .product-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 20px;
            color: #4caf50;
            margin-bottom: 10px;
        }

        .product-code {
            font-size: 16px;
            color: #777;
            margin-bottom: 10px;
        }

        .product-description {
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            margin-bottom: 20px;
        }

        .back-button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }

        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<?php include_once('layout/header1.php'); ?>
    <header>
        <h1>Product Details</h1>
    </header>

    <div class="container">
        <?php
$conn = mysqli_connect('localhost', 'root', '', 'mydatabase');

    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM products WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<div class='product-image'>";
                echo "<img src='uploads/" . $row['product_image'] . "' alt='" . $row['product_name'] . "'>";
                echo "</div>";
                echo "<div class='product-details'>";
                echo "<div class='product-name'>" . $row['product_name'] . "</div>";
                echo "<div class='product-price'>$" . $row['product_price'] . "</div>";
                echo "<div class='product-code'>Code: " . $row['product_code'] . "</div>";
                echo "<div class='product-description'>" . $row['product_details'] . "</div>";
                echo "<a href='home.php' class='back-button'>Back to Product List</a>";
                echo "</div>";
            } else {
                echo "<p>Product not found</p>";
            }
        } else {
            echo "<h1> Please select a product</h1>";
        }

        $conn->close();
        ?>
    </div>
    <?php include_once('layout/footer.php'); ?>
</body>
</html>
