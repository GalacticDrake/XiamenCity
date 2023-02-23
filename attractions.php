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
    <title>Attractions</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="css/attractions.css">
    <link rel="stylesheet" href="css/attractions-custom.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/animate.js" async></script>
</head>

<body>
    <nav class="nav primary">
        <div class="inner-nav">
            <div><a href="landing.php">XIAMEN</a></div>
            <ul>
                <li class="active">Attractions</li>
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
            <div class="heading title">Tourist Attractions</div>
            <a href="attractions/view.php?id=gulangyu">
                <div class="container" id="gulangyu">
                    <div class="image-container">
                        <img src="src/gulangyu.jpg" alt="gulangyu">
                    </div>
                    <div class="desc right">
                        <div class="title">Gulangyu Island</div>
                        <div class="subtitle">Spanning 2 square kilometres, this is rated 5A tourist attraction, the highest rating by the China National Tourism Administration. Stroll the beaches with your loved ones, enjoy a scintilating ocean right outside your accommodation and many more!</div>
                    </div>
                </div>
            </a>
            <a href="attractions/view.php?id=temple">
                <div class="container" id="temple">
                    <div class="image-container right">
                        <img src="src/temple.jpg" alt="south-putuo-temple">
                    </div>
                    <div class="desc left">
                        <div class="title">South Putuo Temple</div>
                        <div class="subtitle">During the Tang dynasty, this Buddhist temple was set up and named after the holy site Mount Putuo in Zhejiang Province.</div>
                    </div>
                </div>
            </a>
            <a href="attractions/view.php?id=garden">
                <div class="container" id="garden">
                    <div class="image-container">
                        <img src="src/garden2.jpg" alt="botanical-garden">
                    </div>
                    <div class="desc right">
                        <div class="title">Xiamen Botanical Garden</div>
                        <div class="subtitle">Also known as the Wanshi Botanical Garden, this can be found in the Southeastern part of the Xiamen Island. It covers an area of 4.93 square kilometers, decorated with hills and grotesquare rocks.</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="module">
            <div class="heading title">Other Attractions</div>
            <div class="flexbox outerflex">
                <a href="attractions/view.php?id=fortress">
                    <div class="card-container outcard one">
                        <div class="card"></div>                 
                        <div class="title">Hulishan Fortress</div>
                    </div>
                </a>
                <div class="flexbox innerflex">
                    <a href="attractions/view.php?id=jimei">
                        <div class="card-container incard two">
                            <div class="card"></div>                 
                            <div class="title">Jimei</div>
                        </div>
                    </a>
                    <a href="attractions/view.php?id=tulou">
                        <div class="card-container incard three">
                            <div class="card"></div>                 
                            <div class="title">Fujian Tulou</div>
                        </div>
                    </a>
                    <a href="attractions/view.php?id=zhongshan">
                        <div class="card-container incard five">
                            <div class="card"></div>                 
                            <div class="title">Zhongshan Road</div>
                        </div>
                    </a>
                    <a href="attractions/view.php?id=huandao">
                        <div class="card-container incard six">
                            <div class="card"></div>                 
                            <div class="title">Huandao Road</div>
                        </div>
                    </a>
                </div>  
                <div class="flexbox innerflex">     
                    <a href="attractions/view.php?id=xiamenu">        
                        <div class="card-container incard seven">
                            <div class="card"></div>                 
                            <div class="title">Xiamen University</div>
                        </div>
                    </a>
                    <div class="card-container incard">
                        <div class="card"></div>                 
                        <div class="title"></div>
                    </div>
                    <div class="card-container incard">
                        <div class="card"></div>                 
                        <div class="title"></div>
                    </div>
                    <div class="card-container incard">
                        <div class="card"></div>                 
                        <div class="title"></div>
                    </div>
                </div> 
                <div class="card-container outcard">
                    <div class="card"></div>                 
                    <div class="title"></div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div>Xiamen City Guide (2021)</div>
    </footer>
</body>
</html>