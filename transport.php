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
    <title>Transportation</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/transport.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <nav class="nav primary">
        <div class="inner-nav">
            <div><a href="landing.php">XIAMEN</a></div>
            <ul>
                <a href="attractions.php"><li>Attractions</li></a>
                <a href="history.php"><li>History</li></a>
                <a href="food-culture.php"><li>Food and Culture</li></a>
                <li class="active">Transportation</li>
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
            <div class="heading title">Convenience in Travelling</div>
            <div class="subheading">There are taxies, city buses, ferries. Even cycling is possible!</div>
            <div class="container">
                <div class="image-container">
                    <img src="src/transport-1.jpg" alt="gulangyu">
                </div>
                <div class="desc right">
                    <div class="title">Xiamen Gaoqi International Airport</div>
                    <div class="subtitle">To get to Xiamen, take a direct flight to this airport, or if unavailable, domestic flights are also possible.                   
                    </div>
                    <a class="link" href="https://www.chinahighlights.com/xiamen/transportation.htm">More info
                    <span class="material-icons md-icon">arrow_forward</span>
                    </a>                    
                </div>
            </div>
            <div class="container">
                <div class="image-container right">
                    <img src="src/transport-2.jpg" alt="gulangyu">
                </div>
                <div class="desc left">
                    <div class="title">Trains</div>
                    <div class="subtitle">
                        There are multiple trains that can be taken.
                        <div class="text-cont">Xiamen Railway Station - Ordinary trains
                            <a class="link" href="https://www.chinahighlights.com/china-trains/">Search trains
                            <span class="material-icons md-icon">arrow_forward</span>
                            </a>
                        </div>
                        <div class="text-cont">High-Speed Railway (HSR) - High-speed trains between Xiamen North and Shenzhen North Station.
                        </div>                 
                    </div>            
                </div>
            </div>
            <div class="container">
                <div class="image-container">
                    <img src="src/transport-3.jpg" alt="gulangyu">
                </div>
                <div class="desc right">
                    <div class="title">Bus</div>
                    <div class="subtitle">
                        There are three main bus stations.
                        <div class="text-cont">Fanghu Long-Distance Bus Station</div>
                        <div class="text-cont">Hubin Long-Distance Bus Station</div>
                        <div class="text-cont">Jimei Long-Distance Bus Station</div>                    
                    </div>            
                </div>
            </div>    
            <div class="container">
                <div class="image-container right">
                    <img src="src/transport-4.jpg" alt="gulangyu">
                </div>
                <div class="desc left custom-1">
                    <div class="title">Ferries</div>
                    <div class="subtitle">
                        Cruise towards Gulangyu Island, and even Kinmen in Taiwan Province, China.
                        <div class="text-cont">Gulangyu island
                            <ul>
                                <li>Xiagu-Neicuo'ao Pier</li>
                                <li>Xiagu-Sanquitian Pier</li>
                                <li>Songyu-Neicuo'ao Pier</li>
                                <li>Lundu-Sanqiutian (night cruise) Pier</li>
                            </ul>
                        </div>
                        <div class="text-cont">Kinmen island - Xiamen Wutong Port</div>                 
                    </div>            
                </div>
            </div>      
        </div>
        <div class="module">
            <div class="heading title">Explore in Detail</div>
            <div class="desc-2 ori-link">
                <div><a href="https://www.chinahighlights.com/xiamen/transportation.htm">https://www.chinahighlights.com/xiamen/transportation.htm</a></div>
            </div>  
        </div>
    </section>
    <footer>
        <div>Xiamen City Guide (2021)</div>
    </footer>
    <script src="js/interactive.js"></script>
    <script src="js/animate.js"></script>
</body>
</html>