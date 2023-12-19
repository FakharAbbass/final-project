<?php

$conn = mysqli_connect('localhost', 'root', '', 'mydatabase');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['myusername'];
    $password = $_POST['mypassword'];

   
    $sql = "SELECT * FROM loginusers WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);

  
    if ($result->num_rows > 0) {
        header("Location: view.php");
    } else {
        echo "Login failed. Invalid username or password.";
     
    }
}

$conn->close();