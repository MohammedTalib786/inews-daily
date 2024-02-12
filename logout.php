<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>

    <!-- bootstrap link -->
    <?php include "link.php" ?>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    
    <!-- Favicon link -->
    <link rel="icon" href="assets/favicon.png">
</head>

<body>
    <!-- database -->
    <?php include "db.php" ?>
    <!-- Navbar -->
    <?php include "nav.php" ?>

    <div class="container my-4 d-flex justify-content-center align-items-center flex-column gap-4 " style="height: 80vh; padding: 0% 5%;">

        <?php
        session_unset();
        session_destroy();
        echo "
            <div class='container'>
                <div class='card text-center'>
                    <div class='card-body'>
                        <h5 class='card-title my-3'>You Have Been Logged Out...</h5>
                    </div>
                </div>
            </div>
        ";
        ?>

    </div>


    <!-- Bootstrap script -->
    <?php include "script.php" ?>

    <script>
        setTimeout(() => {
            window.location = 'index.php';
        }, 1200)
    </script>
</body>

</html>