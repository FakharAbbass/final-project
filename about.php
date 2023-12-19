<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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

.about-section {
    background-color: #4CAF50;
    color: #fff;
    padding: 80px 0;
    text-align: center;
}

.about-section h1 {
    font-size: 36px;
    margin-bottom: 20px;
}

.about-section p {
    font-size: 18px;
}

.team-section {
    background-color: #fff;
    padding: 60px 0;
    text-align: center;
}

.team-section h2 {
    font-size: 32px;
    margin-bottom: 40px;
}

.team-member {
    margin-bottom: 40px;
}

.team-member img {
    border-radius: 50%;
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin-bottom: 20px;
}

.team-member h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

.team-member p {
    font-size: 18px;
}

footer {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

@media screen and (max-width: 768px) {
    .team-member img {
        width: 100%;
        height: auto;
    }
}

 </style>
</head>
<body>
<?php include_once('layout/header1.php'); ?>

    <div class="about-section">
        <div class="container">
            <h1>Welcome to Our Company</h1>
            <p>We are a team of passionate individuals dedicated to delivering excellence. Learn more about our story, values, and mission below.</p>
        </div>
    </div>

    <div class="team-section">
        <div class="container">
            <h2>Meet Our Team</h2>

            <div class="team-member">
                <img src="team_member1.jpeg" alt="Team Member 1">
                <h3>Fakhar Abbas</h3>
                <p>Founder & CEO</p>
            </div>

            <div class="team-member">
                <img src="team_member2.jpeg" alt="Team Member 2">
                <h3>Zeesan ahmad</h3>
                <p>Chief Operating Officer</p>
            </div>

      

        </div>
    </div>
    <?php include_once('layout/footer.php'); ?>
</body>
</html>
