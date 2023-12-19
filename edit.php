<?php

$conn = mysqli_connect('localhost', 'root', '', 'mydatabase');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $product_id = $_GET['id'];


    $sql = "SELECT * FROM products WHERE product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_code = $row['product_code'];
        $in_stock = $row['in_stock'];
        $product_discount = $row['product_discount'];
        $product_size = $row['product_size'];
        $product_details = $row['product_details'];
        $product_image = $row['product_image']; 
    } else {
        echo "Product not found";
        exit;
    }
} else {
    echo "Product ID not provided";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_code = $_POST['product_code'];
    $in_stock = isset($_POST['in_stock']) ? 1 : 0;
    $product_discount = $_POST['product_discount'];
    $product_size = $_POST['product_size'];
    $product_details = $_POST['product_details'];

   
    if ($_FILES['product_image']['error'] == 0) {
        $uploadFile = basename($_FILES['product_image']['name']);
        move_uploaded_file($_FILES['product_image']['tmp_name'], 'uploads/' . $uploadFile);
        $product_image = $uploadFile;
    }




    $current_image = isset($_POST['current_image']) ? $_POST['current_image'] : '';

// ...

if ($_FILES['product_image']['error'] == 0) {

    $uploadFile = basename($_FILES['product_image']['name']);
    move_uploaded_file($_FILES['product_image']['tmp_name'], 'uploads/' . $uploadFile);
    $product_image = $uploadFile;
} else {

    $product_image = $current_image;
}


    $update_sql = "UPDATE products SET 
                   product_name = '$product_name',
                   product_price = '$product_price',
                   product_code = '$product_code',
                   in_stock = '$in_stock',
                   product_discount = '$product_discount',
                   product_size = '$product_size',
                   product_details = '$product_details',
                   product_image = '$product_image' 
                   WHERE product_id = $product_id";
if ($_FILES['product_image']['error'] == 0) {
  
} else {
    $product_image = $current_image;
   
}

    if ($conn->query($update_sql) === TRUE) {
        echo "Product updated successfully";
        header("Location: view.php");
        exit;
    } else {
        echo "Error updating product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
  
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        form {
            margin-top:10%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            margin-left: 35%;
 
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
    <h2>Edit Product</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" value="<?php echo $product_name; ?>" required><br>

        <label for="product_price">Product Price:</label>
        <input type="text" id="product_price" name="product_price" value="<?php echo $product_price; ?>" required><br>

        <label for="product_code">Product Code:</label>
        <input type="text" id="product_code" name="product_code" value="<?php echo $product_code; ?>" required><br>

        <label for="in_stock">In Stock:</label>
        <input type="checkbox" id="in_stock" name="in_stock" <?php echo $in_stock ? 'checked' : ''; ?>><br>

        <label for="product_discount">Product Discount:</label>
        <input type="text" id="product_discount" name="product_discount" value="<?php echo $product_discount; ?>"><br>

        <label for="product_size">Product Size:</label>
        <input type="text" id="product_size" name="product_size" value="<?php echo $product_size; ?>"><br>

        <label for="product_details">Product Details:</label>
        <textarea id="product_details" name="product_details"><?php echo $product_details; ?></textarea><br>

        <label for="product_image">Product Image:</label>
        <input type="file" id="product_image" name="product_image" accept="image/*" value="<?php echo $product_image; ?>"><br>
        <input type="hidden" name="current_image" value="<?php echo $product_image; ?>">

        <?php
        echo "<img src='uploads/" . $row['product_image'] . "' alt='" . $row['product_name'] . "'>";
        ?>




        <button type="submit">Update Product</button>
    </form>
    <?php include_once('layout/footer.php'); ?>
</body>
</html>

<?php
$conn->close();
?>
