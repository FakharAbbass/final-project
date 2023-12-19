<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Your Website</title>
</head>
<style>



header {
    position: absolute;
    background-color: #333;
    color: #fff;
    padding:0px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    top: 46px;
    width: 100%;
}

.logo {
    display: flex;
    align-items: center;
}

.logo img {
    width: 40px;
    height: 40px;
    margin-right: 10px;
}

.logo h1 {
    margin: 0;
}

nav ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

nav li {
    margin-right: 20px;
}

nav a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    transition: color 0.3s;
}

nav a:hover {
    color: #4caf50;
}

</style>


    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo">
            <h1>Your Website</h1>
        </div>
        <nav>
            <ul>
                <li><a href="view.php">View Product</a></li>
                <li><a href="create.php">Create Product</a></li>
                <li><a href="home.php">Logout</a></li>
            </ul>
        </nav>
    </header>


</html>
