<?php


$conn = mysqli_connect('localhost', 'root', '', 'mydatabase');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_sql = "DELETE FROM products WHERE id = $id";

    if ($conn->query($delete_sql) === TRUE) {
        header("Location: ../view.php");
        exit;
    } else {
        echo "Error deleting product: " . $conn->error;
    }
} else {
    echo "Product ID not provided";
    exit;
}

$conn->close();
?>
