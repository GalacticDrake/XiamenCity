<?php
    require('db-pub.php');
    include('auth.php');
    $login = 1;

    if(isset($_SESSION["username"])) {
        require('db.php');
        $login = 0;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page not found</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/error.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <script src="js/animate.js" async></script>  
    <script src="js/ripple.js" async></script>
</head>

<body>
    <nav class="nav primary">
        <div class="inner-nav">
            <div>XIAMEN</div>
            <ul>
                <a href="attractions.php"><li>Attractions</li></a>
                <a href="history.php"><li>History</li></a>
                <a href="food-culture.php"><li>Food and Culture</li></a>
                <a href="transport.php"><li>Transportation</li></a>
                <?php
                    if($login == 0) {
                        echo '
                        <li class="login dropdown">
                            <div class="flexbox">
                                <span>'.$_SESSION["username"].'</span>
                                <span class="material-icons md-icon">
                                    arrow_drop_down
                                </span>
                            </div>
                            <div class="dropdown-content">
                                <a href="logbook.php"><div>Logbook</div></a>
                                <a href="logout.php"><div>Logout</div></a>                                
                            </div>
                        </li>
                        ';
                    } else {
                        echo '<a href="login.php"><li class="login">Login</li></a>';
                    }
                ?>                
            </ul>
        </div>
    </nav>
    <section>
    <div class="navspace"></div>
        <div class="module animate">
            <div class="heading title">404. Page not found</div>
            <div class="subheading">It looks like we cannot find the page you have requested for.</div>             
            <div class="return">
                <button class="r-button button" type="button" onclick="setTimeout(function() {location.href='landing.php';}, 400);">
                    <div class="ripple js-ripple">
                        <span class="ripple-effect">
                        </span>                        
                    </div>
                    Return to home
                </button>         
            </div>
        </div>
    </section>
    <footer>
        <div>Xiamen City Guide (2021)</div>
    </footer>
</body>
</html>