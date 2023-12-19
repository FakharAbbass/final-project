<?php
// Connect to your MySQL database (replace with your credentials)
// $servername = "localhost";
// $username = "root";
// $password = "jazakALLAH12";
// $dbname = "mydatabase";

$conn = mysqli_connect('localhost', 'root', '', 'mydatabase');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve product data from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-table {
            margin-left: 10%;
    width: 71%;
    border-collapse: collapse;
    margin-top: 20px;
        }
        .action{
            padding:13px;
        }

        .product-table th,
        .product-table td {
            border: 1px solid #ddd;
        
            text-align: left;
        }

        .product-table th {
            background-color: #333;
            color: #fff;
        }

        .product-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .update-button,
        .delete-button {
            background-color: #4caf50;
            color: #fff;
            padding: 2px 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .this{
            margin-top:10%;
        }

        .delete-button {
            background-color: #e53935;
        }

        .update-button:hover,
        .delete-button:hover {
            background-color: #45a049;
        }

        @media screen and (max-width: 600px) {
            .product-table {
                display: block;
                overflow-x: auto;
            }

            .product-table th,
            .product-table td {
                white-space: nowrap;
            }
        }

    </style>
</head>
<body>

<?php include_once('layout/header.php'); ?>
<?php include_once('layout/header2.php'); ?>

    
    <div class="this">
    <h2>Product List</h2>
    <table border ="1" class="product-table ">
        <tr class="product-table th">
            <th >ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Code</th>
            <th>In Stock</th>
            <th>Discount</th>
            <th>Size</th>
            <th>Details</th>
            <th>Image</th>
            <th >Action</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['product_price'] . "</td>";
                echo "<td>" . $row['product_code'] . "</td>";
                echo "<td>" . ($row['in_stock'] ? 'Yes' : 'No') . "</td>";
                echo "<td>" . $row['product_discount'] . "</td>";
                echo "<td>" . $row['product_size'] . "</td>";
                echo "<td>" . $row['product_details'] . "</td>";
                echo "<td><img src='uploads/" . $row['product_image'] . "' height='50' width='50'></td>";
                echo "<td><a href='edit.php?id=" . $row['product_id'] . "'  class='update-button'>Edit</a> | <a href='actions/delete_product.php?id=" . $row['id'] . "' class='delete-button'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No products found</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    </div>
    <?php include_once('layout/footer2.php'); ?>
</body>
</html>
