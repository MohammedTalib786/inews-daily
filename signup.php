<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up to iNews Daily</title>

    <!-- bootstrap link -->
    <?php include "link.php" ?>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    
    <!-- Favicon link -->
    <link rel="icon" href="assets/favicon.png">

</head>

<body>
    <?php include "db.php" ?>
    <?php include "nav.php" ?>

    <div class="margins" style="height: 4.4rem;">

        <?php
        if (isset($_POST["submit"])) {
            // echo "Clicked";
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirmpassword"];
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $regexSpcl = "/[~!@#$%^&*]/";

            if (empty($username)) {
                echo "
                    <div id='removed' class='alert alert-info' role='alert'>
                        <b>Error!</b> Username Can not be Empty
                    </div>
            ";
            } elseif (empty($email)) {
                echo "
                    <div id='removed' class='alert alert-info' role='alert'>
                        <b>Error!</b> Email Address Can not be Empty
                    </div>
            ";
            } elseif (empty($password)) {
                echo "
                    <div id='removed' class='alert alert-info' role='alert'>
                        <b>Error!</b> Password Can not be Empty
                    </div>
            ";
            } elseif (strlen($password) < 6) {
                echo "
                    <div id='removed' class='alert alert-info' role='alert'>
                        <b>Error!</b> Password must be 6 characters long
                    </div>
            ";
            } elseif (!preg_match($regexSpcl, $password)) {
                echo "
                    <div id='removed' class='alert alert-info' role='alert'>
                        <b>Error!</b> Password must use one special character
                    </div>
            ";
            } elseif (empty($confirmpassword)) {
                echo "
                    <div id='removed' class='alert alert-info' role='alert'>
                        <b>Error!</b> Confirm Password field is Empty
                    </div>
            ";
            } elseif ($password != $confirmpassword) {
                echo "
                    <div id='removed' class='alert alert-info' role='alert'>
                        <b>Error!</b> Passwords Does not match
                    </div>
            ";
            } else {
                // echo "Username $username<br>";
                $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
                $result = mysqli_query($con, $insertQuery);
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;
                if ($result) {
                    echo "
                        <div id='removed' class='alert alert-info' role='alert'>
                            User Has Been Registered! Please Wait...
                        </div>
                    ";
                    echo "
                        <script>
                            setTimeout(()=>{
                                window.location = 'index.php'
                            }, 1500)
                        </script>
                ";
                } else {
                    echo "
                        <div id='removed' class='alert alert-info' role='alert'>
                            <b>Error!</b> This email Already Exists
                        </div>
                    ";
                }
            }
        }
        ?>

    </div>
    <div class="container d-flex justify-content-center align-items-center flex-column" style="height: 78vh; ">

        <h1 class="text-center">Sign Up: </h1>
        <form action="signup.php" method="post" autocomplete="off" class="container " style="padding: 0% 5%; row-gap: 2rem; ">
            <label for="username" class="form-label">Username: </label>
            <input type="text" class="form-control" name="username" id="username">
            <label for="email" class="form-label">Email: </label>
            <input type="email" class="form-control" name="email" id="email">
            <label for="password" class="form-label">Password: </label>
            <input type="password" class="form-control" name="password" id="password">
            <label for="confirmpassword" class="form-label">Confirm Password: </label>
            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword">
            <input type="checkbox" class="mb-3 mt-2" name="showPass" id="showPass"><label for="showPass">&nbsp;Show Password</label><br><br>
            <input type="submit" class="btn btn-primary " value="Submit" name="submit">
        </form>

    </div>

    <!-- Bootstrap Script -->
    <?php include "script.php" ?>

    <!-- show password and alert/removeAlert Script   -->
    <?php include "auth.php" ?>

</body>

</html>