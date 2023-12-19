<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <script src=".js"></script>
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

        .wrapper{
            height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .product-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
            width: 300px;
            margin: 10px;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-image {
            height: 200px;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-details {
            padding: 15px;
            text-align: center;
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-price {
            margin-bottom: 5%;
            font-size: 16px;
            color: #4caf50;
        }

        .product-button {
            text-decoration: none;
            background-color: #4caf50;
            color: #fff;
            padding: 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
            margin-top: 10px;
        }
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

.slider-container {
    position: relative;
    width: 100%;
  
    margin: auto;
    overflow: hidden;
}

.slide {
    display: none;
    width: 100%;
}

img {
    width: 100%;
    height: 500px;
}

.prev,
.next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 24px;
    cursor: pointer;
    color: #fff;
    background-color: #4caf50;
    padding: 10px;
    border: none;
    border-radius: 5px;
}
.title{
    text-align: center;
    background-color: #707e88;
    padding: 10px;

}

.prev {
    left: 10px;
}

.next {
    right: 10px;
}

@media screen and (max-width: 600px) {
    .prev,
    .next {
        font-size: 16px;
        padding: 8px;
    }
}

    </style>
</head>
<body>
    <?php include_once('layout/header1.php'); ?>

    <div class="slider-container">
        <?php
      
            $images = [
                'image1.png',
                'image2.png',
                'image3.png',
                'image4.png',
            ];
            
            foreach ($images as $image) {
                echo "<div class='slide'>";
                echo "<img src='images/$image' alt='Slider Image'>";
                echo "</div>";
            }
        ?>
        
        <div class="prev" onclick="changeSlide(-1)">&#10094;</div>
        <div class="next" onclick="changeSlide(1)">&#10095;</div>
    </div>

    <script src="script.js"></script>

    <div class="wrapper">
    <!-- <h1 class="title">products</h1> -->
        <div class="container">
           
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'mydatabase');

 
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

       
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product-card'>";
                    echo "<div class='product-image'>";
                    echo "<img src='uploads/" . $row['product_image'] . "' alt='" . $row['product_name'] . "'>";
                    echo "</div>";
                    echo "<div class='product-details'>";
                    echo "<div class='product-name'>" . $row['product_name'] . "</div>";
                    echo "<div class='product-price'>$" . $row['product_price'] . "</div>";
                    echo "<a href='product.php?id=" . $row['id'] . "' class='product-button'>View Details</a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No products found</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <?php include_once('layout/footer.php'); ?>
</body>
</html>
