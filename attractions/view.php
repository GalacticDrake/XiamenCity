<?php
    require('../db-pub.php');
    include('../auth.php');
    $login = 1;

    if(isset($_SESSION["username"])) {
        require('../db.php');        
        $login = 0;
    }
    
    $location = $_GET["id"];

    $query_string = "SELECT * FROM attractions WHERE Abbr = ?";
    $query_location = $public->prepare($query_string);
    $query_location->bind_param("s", $location);
    $query_location->execute();
    $query_obj = $query_location->get_result();
    
    if(mysqli_num_rows($query_obj) > 0) {
        $loc_desc = mysqli_fetch_array($query_obj);

        $query_string_2 = "SELECT * FROM attractexp WHERE Parent = ?";
        $query_location_2 = $public->prepare($query_string_2);
        $query_location_2->bind_param("s", $location);
        $query_location_2->execute();
        $query_obj_2 = $query_location_2->get_result();  
    } else {
        header("Location: ../error.php");
        exit();
    }
       
?>


<!DOCTYPE html>
<html>
<head>
    <title><?php echo ucfirst($location); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/attraction-view.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <nav class="nav primary">
        <div class="inner-nav">
            <div><a href="../landing.php">XIAMEN</a></div>
            <ul>
                <a href="../attractions.php"><li>Attractions</li></a>
                <a href="../history.php"><li>History</li></a>
                <a href="../food-culture.php"><li>Food and Culture</li></a>
                <a href="../transport.php"><li>Transportation</li></a>
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
                                <a href="../logbook.php"><div>Logbook</div></a>
                                <a href="../logout.php"><div>Logout</div></a>   
                            </div>
                        </li>
                        ';
                    } else {
                        echo '<a href="../login.php"><li class="login">Login</li></a>';
                    }
                ?>
            </ul>
        </div>
    </nav>
    <section>
        <div class="navspace"></div>        
        <div class="module animate">
            <div class="container">
                <div class="image" style="background-image: url(../src/<?php echo strtolower($loc_desc["abbr"]); ?>-full.jpg);"></div>
                <div class="inner-container">
                    <?php 
                        function easyDate($longdate) {
                            $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

                            $year = substr($longdate, 0, 4);
                            $month = $months[substr($longdate, 5, 2) - 1];
                            $day = substr($longdate, 8, 2);

                            echo "$day $month $year";
                        }

                        if($login == 0) {
                            $visit_string = "SELECT {$location}, {$location}_visit FROM records WHERE username = ?";
                            $query_visit = $con->prepare($visit_string);
                            $query_visit->bind_param("s", $_SESSION["username"]);
                            $query_visit->execute();
                            $visit = mysqli_fetch_array($query_visit->get_result());

                            if($visit[$location] == 0) {
                                echo '
                                <div class="flexbox toolbar">
                                    <a href="visit.php?id='.$location.'">Mark visited</a>
                                </div>
                                ';
                            } else if($visit[$location] == 1) {
                                echo '
                                <div class="flexbox toolbar">
                                    <div>Visited on ';
                                    easyDate($visit["{$location}_visit"]);
                                    echo '</div>
                                </div>
                                ';
                            } else {
                                echo '
                                <div class="flexbox toolbar">
                                    <div>Something went wrong.</div>
                                </div>
                                ';
                            }                       
                        }
                    ?>                   
                    <div class="desc-1">
                        <div class="title"><?php echo $loc_desc["name"]; ?></div>
                        <div class="subtitle"><?php echo $loc_desc["description"]; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="module module-space animate"></div>
        <div class="module desc-parent-2 animate">
            <div class="flexbox desc-2">
                <div class="card">
                    <div class="title">Location</div>
                    <div class="text no-sup"><?php echo $loc_desc["location"]; ?></div>
                </div>
                <div class="card">
                    <div class="title">Size</div>
                    <div class="text"><?php echo $loc_desc["size"]; ?> km<sup>2</sup></div>
                    <div class="text"><?php if($loc_desc["size"] == '-') echo '-'; else printf("%3.2f", $loc_desc["size"] * 0.386102); ?> miles<sup>2</sup></div>
                </div>
                <div class="card">
                    <div class="title">Established</div>
                    <div class="text"><?php echo $loc_desc["established"]; ?></div>
                </div>
                <div class="card">
                    <div class="title">Getting There</div>
                    <?php
                        while(1) {
                            if(strpos($loc_desc["get"], "#") != FALSE) {
                                $last = strpos($loc_desc["get"], "#");

                                echo '<div class="text">';
                                echo substr($loc_desc["get"], 0, $last);
                                echo '</div>';

                                $loc_desc["get"] = substr_replace($loc_desc["get"], "", 0, $last+2);
                            } else {
                                break;
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="module">
            <div class="map">
                <iframe src="<?php echo $loc_desc["maplink"]; ?>" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>        
        </div>
        <div class="module explore">
            <div class="heading title">Explore</div>
            <div class="flexbox outerflex">
                <div class="card-container large no-transform">                    
                    <div class="card" style="background-image: url(../src/<?php echo strtolower($loc_desc["abbr"]) ?>-1.jpg)"></div>                 
                    <?php $exp_desc = mysqli_fetch_array($query_obj_2); ?>
                    <div class="title"><?php echo $exp_desc["name"] ?></div>
                </div>
            <div class="flexbox innerflex">
            <?php
                $i = 2;
                while($exp_desc = mysqli_fetch_array($query_obj_2)) {
                    echo 
                    '                    
                        <div class="card-container small no-transform">
                            <div class="card" style="background-image: url(../src/'.strtolower($loc_desc["abbr"]).'-'.$i.'.jpg)">                            
                            </div>
                            <div class="title">'.$exp_desc["name"].'</div>
                        </div>                     
                    ';
                    $i++;
                }
            ?>
            </div>  
        </div>
        <?php
            if($loc_desc["oriweblink"] != NULL) {
                echo '
                <div class="module">
                    <div class="heading title">More Information</div>
                    <div class="desc-2 ori-link">
                        <div><a href="'.$loc_desc["oriweblink"].'">'.$loc_desc["oriweblink"].'</a></div>
                    </div>  
                </div>';
            }
        ?>
    </section>
    <footer>
        <div>Xiamen City Guide (2021)</div>
    </footer>
    <script src="../js/animate.js"></script>
</body>
</html>