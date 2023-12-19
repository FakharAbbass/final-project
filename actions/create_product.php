<?php

$conn = mysqli_connect('localhost', 'root', '', 'mydatabase');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_code = $_POST['product_code'];
$in_stock = isset($_POST['in_stock']) ? 1 : 0;
$product_discount = $_POST['product_discount'];
$product_size = $_POST['product_size'];
$product_details = $_POST['product_details'];


$product_image = $_FILES['product_image']['name'];
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES['product_image']['name']);

move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);


$sql = "INSERT INTO products (product_id, product_name, product_price, product_code, in_stock, product_discount, product_size, product_details, product_image)
        VALUES ('$product_id', '$product_name', '$product_price', '$product_code', '$in_stock', '$product_discount', '$product_size', '$product_details', '$product_image')";

if ($conn->query($sql) === TRUE) {
    echo "Product added successfully";
    header("Location: ../view.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
