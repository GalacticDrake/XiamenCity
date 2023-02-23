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
    <title>Food and Culture</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/food.css">
    <link rel="stylesheet" href="css/food-custom.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <nav class="nav primary">
        <div class="inner-nav">
            <div><a href="landing.php">XIAMEN</a></div>
            <ul>
                <a href="attractions.php"><li>Attractions</li></a>
                <a href="history.php"><li>History</li></a>
                <li class="active">Food and Culture</li>
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
            <div class="heading title">Delicacy</div>
            <div class="subheading">Don't miss out on these delicious delicacies Xiamen has to provide!</div>
            <div class="flexbox outerflex">
                <div class="card-container one outcard">
                    <div class="card"></div>                 
                    <div class="title">Deep Fried Tofu Dumplings</div>
                </div>                
                <div class="flexbox innerflex">
                    <div class="card-container two incard">
                        <div class="card">                            
                        </div>
                        <div class="title">Oyster Omelette</div>
                    </div>
                    <div class="card-container three incard">
                        <div class="card">                            
                        </div>
                        <div class="title">Xianbing</div>
                    </div>
                    <div class="card-container four incard">
                        <div class="card">                            
                        </div>
                        <div class="title">Fish Ball Soup</div>
                    </div>
                    <div class="card-container five incard">
                        <div class="card">                           
                        </div>
                        <div class="title">Ginger Duck</div>
                    </div>
                </div>
            </div>   
            <div class="flexbox outerflex">                               
                <div class="flexbox innerflex">
                    <div class="card-container six incard">
                        <div class="card">                            
                        </div>
                        <div class="title">Satay Noodles</div>
                    </div>
                    <div class="card-container seven incard">
                        <div class="card"></div>
                        <div class="title">Steamed Pork</div>
                    </div>
                    <div class="card-container eight incard">
                        <div class="card">                            
                        </div>
                        <div class="title">Shrimp Noodles</div>
                    </div>
                    <div class="card-container nine incard">
                        <div class="card">                           
                        </div>
                        <div class="title">Sand Worm Jelly</div>
                    </div>
                </div>
                <div class="card-container ten outcard">
                    <div class="card"></div>                 
                    <div class="title">Shao Xian Cao</div>
                </div> 
            </div>             
        </div>
        <div class="module">
            <div class="heading title">Culture</div>
            <div class="subheading">Experience the variety and colourful cultures!</div>
            <div class="flexbox outerflex">
                <div class="card-container eleven outcard">
                    <div class="card"></div>                 
                    <div class="title">Kung Fu Tea Ceremony</div>
                </div>                
                <div class="flexbox innerflex">
                    <div class="card-container twelve incard">
                        <div class="card">                            
                        </div>
                        <div class="title">Jianggu</div>
                    </div>
                    <div class="card-container thirteen incard">
                        <div class="card">                            
                        </div>
                        <div class="title">Mid-Autumn Mooncake Gambling</div>
                    </div>
                    <div class="card-container fourteen incard">
                        <div class="card">                            
                        </div>
                        <div class="title">Song Wang Chuan</div>
                    </div>
                    <div class="card-container fifteen incard">
                        <div class="card">                           
                        </div>
                        <div class="title">Gezai Opera</div>
                    </div>
                </div>
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