<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to iNews Daily</title>

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

    <div class="margins" style="height: 4.4rem;">
        <?php
        if (isset($_POST["submit"])) {
            // echo "Clicked";
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            if (empty($username)) {
                echo "
                    <div id='removed' class='alert alert-info' role='alert'>
                        <b>Error!</b> Username Can not be Empty
                    </div>
            ";
            } elseif (empty($email)) {
                echo "
                    <div id='removed' class='alert alert-info' role='alert'>
                        <b>Error!</b> Email Can not be Empty
                    </div>
            ";
            } elseif (empty($password)) {
                echo "
                    <div id='removed' class='alert alert-info' role='alert'>
                        <b>Error!</b> Password Can not be Empty
                    </div>
            ";
            } else {
                // echo "Username $username<br>";
                $Select = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";

                $result = mysqli_query($con, $Select);
                $rows = mysqli_num_rows($result);
                $fetRes = mysqli_fetch_assoc($result);
                // echo $rows;
                if ($rows == 1) {
                    // echo $fetRes["username"];
                    if (password_verify($password, $fetRes["password"])) {
                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["email"] = $email;
                        echo "
                                <div id='removed' class='alert alert-info' role='alert'>
                                    User Found! Please Wait...
                                </div>
                            ";
                        echo "
                                <script>
                                    setTimeout(()=>{
                                        window.location = 'index.php'
                                    }, 1200)
                                </script>
                        ";
                    } else {
                        echo "
                                <div id='removed' class='alert alert-info' role='alert'>
                                    Wrong Password
                                </div>
                            ";
                    }
                } else {
                    echo "
                            <div id='removed' class='alert alert-info' role='alert'>
                                Invalid Username or Email
                            </div>
                        ";
                }
            }
        }
        ?>

    </div>

    <div class="container d-flex justify-content-center align-items-center flex-column" style="height: 78vh; ">

        <h1 class="text-center">Login: </h1>
        <form action="login.php" method="post" autocomplete="off" class="container " style="padding: 0% 5%; row-gap: 2rem; ">
            <label for="username" class="form-label">Username: </label>
            <input type="text" class="form-control" name="username" id="username">
            <label for="email" class="form-label">Email: </label>
            <input type="email" class="form-control" name="email" id="email">
            <label for="password" class="form-label">Password: </label>
            <input type="password" class="form-control" name="password" id="password">
            <input type="checkbox" class="mb-3 mt-2" name="showPass" id="showPass"><label for="showPass">&nbsp;Show Password</label><br><br>
            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
        </form>

    </div>

    <!-- Bootstrap script -->
    <?php include "script.php" ?>

    <!-- show password and alert/removeAlert Script   -->
    <?php include "auth.php" ?>

</body>

</html>