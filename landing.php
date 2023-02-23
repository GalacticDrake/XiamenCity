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
    <title>Xiamen</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="css/landing-custom.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <script src="js/nav.js" async></script>
    <script src="js/animate.js" async></script>  
</head>

<body>
    <nav class="nav secondary">
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
        <div class="module modland animate">
            <div class="landing">
                <video muted autoplay loop>
                    <source src="src/Landing.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="landing-overlay"></div>
                <div class="vid-hdr">
                    <div class="title">Xiamen</div>
                    <div class="subtitle">The Gate of China</div>
                </div>                
            </div>            
        </div>
        <div class="module mod-flex animate">
            <div class="heading title">Key Attractions</div>
            <div class="subheading subtitle">Here are some memorable places you will want to visit.</div>
            <div class="flexbox outerflex">
                <div class="card-container one">
                    <div class="card"></div>                 
                    <div class="title">Gulangyu Island</div>
                </div>                
                <div class="flexbox innerflex">
                    <div class="card-container two">
                        <div class="card">                            
                        </div>
                        <div class="title">South Putuo Temple</div>
                    </div>
                    <div class="card-container three">
                        <div class="card">                            
                        </div>
                        <div class="title">Botanical Garden</div>
                    </div>
                    <div class="card-container four">
                        <div class="card">                            
                        </div>
                        <div class="title">Hulishan Fortress</div>
                    </div>
                    <div class="card-container five">
                        <div class="card">                           
                        </div>
                        <div class="title">Jimei</div>
                    </div>
                </div>
            </div>        
        </div>
        <div class="module">
            <div class="heading title">Interest</div>
            <div class="flexbox outerflex">                
                <div class="card-container six">
                    <div class="card">                            
                    </div>
                    <div class="title">Attractions</div>
                </div>
                <div class="card-container seven">
                    <div class="card">                            
                    </div>
                    <div class="title">History</div>
                </div>
                <div class="card-container eight">
                    <div class="card">                            
                    </div>
                    <div class="title">Food and Culture</div>
                </div>
                <div class="card-container nine">
                    <div class="card">                           
                    </div>
                    <div class="title">Transportation</div>
                </div>
            </div>
        </div>
        <div class="module">
            <div class="heading title">Location</div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116182.41657307024!2d118.04591696860787!3d24.49583139930717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34148379e5bfeb27%3A0x28a0670a9668d056!2sXiamen%2C%20Fujian%2C%20China!5e0!3m2!1sen!2smy!4v1640004551196!5m2!1sen!2smy" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
    <footer>
        <div>Xiamen City Guide (2021)</div>
    </footer>
</body>
</html>