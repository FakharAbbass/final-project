<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
   <style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

header {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

.contact-section {
    background-color: #8ac38d;
    color: #fff;
    padding: 80px 0;
    text-align: center;
}

.contact-section h1 {
    font-size: 36px;
    margin-bottom: 20px;
}

.contact-section p {
    font-size: 18px;
    margin-bottom: 40px;
}

form {
    max-width: 600px;
    margin: 0 auto;
}

label {
    display: block;
    font-size: 18px;
    margin-bottom: 8px;
    color: #fff;
}

input,
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    box-sizing: border-box;
}

button {
    background-color: #fff;
    color: #4CAF50;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #e6e6e6;
}

   </style>
</head>
<body>
<?php include_once('layout/header1.php'); ?>

    <div class="contact-section">
        <div class="container">
            <h1>Contact Us</h1>
            <p>Have questions or feedback? Feel free to reach out to us using the form below.</p>

            <form action="process_contact.php" method="post">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>

    <?php include_once('layout/footer.php'); ?>
</body>
</html>
