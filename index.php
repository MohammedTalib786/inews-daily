<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (isset($_SESSION["email"]) && isset($_SESSION["username"])) {
        $uForTitle = $_SESSION["username"];
        echo "<title>Welcome - $uForTitle | iNews Daily </title>";
    } else {
        echo "<title>Welcome to iNews Daily </title>";
    }
    ?>

    <!-- bootstrap link -->
    <?php include "link.php" ?>

    <!-- Font Awsome link -->
    <?php include "fontlink.php" ?>

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

    <?php

    if (isset($_SESSION["email"]) && isset($_SESSION["username"])) {
        $u = $_SESSION["username"];
        $e = $_SESSION["email"];
        echo "
            <div id='cardRemove' class='card text-center'>
                <div class='card-body'>
                    <h5 class='card-title'>Hello - $u</h5>
                    <p class='card-text'>Welcome to iNews Web App Watch Daily News and get Updated!</p>
                    <a href='#' id='cardRemoveBtn' class='btn btn-primary'>Close It</a>
                </div>
            </div>
        ";

        echo "
        <h1 class='text-center my-5 '>iNews Daily - Home</h1>

        <div id='cont' class='container d-flex justify-content-center align-items-center flex-wrap gap-4 my-4  '>
    
            <div class='spinner my-5 '></div>
    
        </div>
        <button class='scrollToTop' id='scrollToTop'><i class='fa-solid fa-angle-up'></i></button>
        ";
    } else {
        echo "
            <div class='card text-center'>
                <div class='card-body'>
                    <h5 class='card-title'>Hello There</h5>
                    <p class='card-text'><a href='signup.php' class='anchor'>Sign Up</a> or <a href='login.php' class='anchor'>Login</a> to Get Updated with Daily News</p>
                </div>
            </div>
        ";
    }

    ?>

    <!-- Bootstrap script -->
    <?php include "script.php" ?>

    <!-- External Script -->
    <script src="script.js"></script>

    <!-- Script tag for fetching Data -->
    <script>
        const fetchDataHome = (async () => {
            try {
                let cont = document.getElementById('cont')
                let url = "https://ok.surf/api/v1/cors/news-feed";
                let data = await fetch(url);
                let response = await data.json();
                // console.log(response)
                // console.log(response.World)
                let result = response.World;

                let iHtml = '';
                result.map((elem) => {
                    // console.log(elem)
                    iHtml += `
                <div class="card my-4" style="width: 20rem;">
                    <img src="${elem.og}" class="card-img-top" style="width: 100%; height: 12rem; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">${elem.title.slice(0,80)}...</h5>
                        <p class="card-text"><b>Source:</b>  <img src="${elem.source_icon}" style="width: 12%; height: 1.5rem; object-fit: contain;">  ${elem.source}</p>
                        <a href="${elem.link}" target="_blank" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            `;
                })
                cont.innerHTML = iHtml;
            } catch (e) {
                console.log(e.message)
                cont.innerHTML = "Sorry😔! Failed To Fetch Data You can visit us after sometime...";
            }
        })()

        // setTimeout(fetchDataHome, 2500)


        // close btn for only index header on remove
        let cardRemove = document.getElementById('cardRemove');
        let cardRemoveBtn = document.getElementById('cardRemoveBtn');
        cardRemoveBtn.addEventListener('click', () => {
            cardRemove.style.display = 'none';
        })
    </script>
</body>

</html>