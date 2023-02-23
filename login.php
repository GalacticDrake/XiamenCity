<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <script src="js/animate.js" async></script>  
    <script src="js/ripple.js" async></script>
</head>
<body>
    <nav class="nav primary">
        <div class="inner-nav">
            <div><a href="landing.php">XIAMEN</a></div>
            <ul>
                <a href="attractions.php"><li>Attractions</li></a>
                <a href="history.php"><li>History</li></a>
                <a href="food-culture.php"><li>Food and Culture</li></a>
                <a href="transport.php"><li>Transportation</li></a>
                <a href="login.php"><li class="login">Login</li></a>
            </ul>
        </div>
    </nav>
    <section>
        <div class="navspace"></div>
        <div class="outer">
            <div class="container">
                <?php
                    require('db.php');
                    session_start();

                    // If form submitted, insert values into the database.
                    if (isset($_POST['username'])){

                        $username = stripslashes($_REQUEST['username']); // removes backslashes
                        $username = mysqli_real_escape_string($con, $username); //escapes special characters in a string
                        $password = stripslashes($_REQUEST['password']);
                        $password = mysqli_real_escape_string($con, $password);                       
                        
                        $query = "SELECT * FROM accounts WHERE username='$username' and password='".md5($password)."'";
                        $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        
                        $rows = mysqli_num_rows($result);
                        if($rows == 1) {
                            $_SESSION['username'] = $username; // store username for identity later
                            $_SESSION['role'] = $role; // store role in session for later

                            $display = mysqli_fetch_assoc($result);

                            $_SESSION['display_name'] = $display['name'];

                            header("Location: landing.php"); // redirects user to dashboard
                        } else {
                            usleep(400 * 1000); // intentionally delay for animation
                            echo "
                                <div class='form'>
                                    <h3>Username/password is incorrect.</h3>
                                    Please try again.
                                    <div class='submit'>
                                    <button class='r-button button' type='button' onclick=\"location.href='login.php';\">
                                        <div class='ripple js-ripple'>
                                            <span class='ripple-effect'>
                                            </span>                        
                                        </div>
                                        Login
                                    </button>
                                </div>";
                        }
                    } else {
                ?>
                <div class="module">
                    <form method="post" name="login" action="" autocomplete="off">             
                        <div class="sub-container">
                            <div class="title">
                                <div id="child-subtitle">Login now to track your visits!</div>
                            </div>
                            <div class="sub-container">
                                <div id="register" class="register"><a href="register.php">Register an account</a></div>
                            </div>
                        </div>
                        <div class="login-container">
                            <div class="login-info">
                                <input type="text" id="username" name="username" required>
                                <div class="label label-large" id="userlabel">Username</div>
                            </div>
                            <div style="height: 15px;"></div>
                            <div class="login-info">
                                <input type="password" id="password" name="password" required>
                                <div class="label label-large" id="pwlabel">Password</div>
                            </div>
                        </div>
                        <div class="submit">
                            <button class="r-button button" type="submit" value="submit">
                                <div class="ripple js-ripple">
                                    <span class="ripple-effect">
                                    </span>                        
                                </div>
                                Login
                            </button>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <footer>
        <div>Xiamen City Guide (2021)</div>
    </footer>
    <script src="js/login.js"></script>
</body>
</html>