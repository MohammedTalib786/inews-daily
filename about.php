<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - iNews Daily</title>

    <!-- bootstrap link -->
    <?php include "link.php" ?>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <!-- Favicon link -->
    <link rel="icon" href="assets/favicon.png">
</head>

<body>
    <!-- Navbar -->
    <?php include "nav.php" ?>

    <?php
    if (isset($_SESSION["email"]) && isset($_SESSION["username"])) {
        $u = $_SESSION['username'];
        echo "
            <div class='container my-2 d-flex justify-content-evenly align-items-center flex-column text-center ' style='min-height: 85vh; font-size: 1.25rem; letter-spacing: 1px; line-height: 2.5rem; padding: 7% 6%; ' >
                <h1 style='font-size: 3.5rem;'>About Us</h1>
                <p>Hello <b>$u</b> hope you are doing well. <br> This is a News App which shows news around the world from business, technologies to science, sports and etc as we have different categories of news. you just need to Sign Up OR Login to get the daily news in your phone, tablet, PC anywhere... </p>
            </div>
        ";
    } else {
        echo "
        <div class='container my-2 d-flex justify-content-evenly align-items-center flex-column text-center ' style='min-height: 85vh; font-size: 1.25rem; letter-spacing: 1px; line-height: 2.5rem; padding: 7% 6%; ' >
            <h1 style='font-size: 3.5rem;'>About Us</h1>
            <p>Hello there <a href='signup.php' class='anchor'>Sign Up</a> or <a href='login.php' class='anchor'>Login</a> to get Daily News in just few Clicks<br> This is a News App which shows news around the world from business, technologies to science, sports and etc as we have different categories of news. you just need to Sign Up OR Login to get the daily news in your phone, tablet, PC anywhere... </p>
        </div>        
        ";
    }

    ?>

    <!-- bootstrap script -->
    <?php include "script.php" ?>
</body>

</html>