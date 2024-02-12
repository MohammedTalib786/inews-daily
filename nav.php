<nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding: .65rem 3rem;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">iNews Daily</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link navForActive"  href="index.php">Home</a>
        </li>

        <?php

        if (!isset($_SESSION["username"]) && !isset($_SESSION["email"])) {
          echo "
            <li class='nav-item'>
              <a class='nav-link navForActive' href='about.php'>About Us</a>
            </li>
            <li id='rightShift' class='nav-item dropdown' >
              <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                Sign up/Login
              </a>
              <ul class='dropdown-menu'>
                <li><a class='dropdown-item navForActive' href='signup.php'>Sign Up</a></li>
                <li><a class='dropdown-item navForActive' href='login.php'>Login</a></li>
              </ul>
            </li>
          ";
        } else {
          $uName = $_SESSION["username"];
          echo "
            <li class='nav-item'>
              <a class='nav-link navForActive' href='business.php'>Business</a>
            </li>
            
            <li class='nav-item'>
              <a class='nav-link navForActive' href='entertainment.php'>Entertainment</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link navForActive' href='health.php'>Health</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link navForActive' href='science.php'>Science</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link navForActive' href='sports.php'>Sports</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link navForActive' href='technology.php'>Technology</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link navForActive' href='us.php'>US</a>
            </li>

            <li class='nav-item'>
              <a class='nav-link navForActive' href='about.php'>About Us</a>
            </li>

            <li id='rightShift' class='nav-item dropdown' >
              <a class='nav-link dropdown-toggle navForActive' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                Welcome $uName
              </a>
              <ul class='dropdown-menu'>
                <li><a class='dropdown-item navForActive' href='logout.php'>Logout</a></li>
              </ul>
            </li>
        ";
        }
        ?>

      </ul>

    </div>
  </div>
</nav>