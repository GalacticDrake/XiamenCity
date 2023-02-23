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
    <title>Logbook</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/logbook.css">

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
                        echo '<a href="../login.php"><li class="login">Login</li></a>';
                    }
                ?>
            </ul>
        </div>
    </nav>
    <section>
        <div class="navspace"></div>
        <div class="module display">
            <div class="heading title">Logbook</div>
            <div class="container">
                <div class="subheading">Visited</div>
                <div class="flexbox outerflex">
                    <?php
                        // obtain all locations in table
                        $query_string = "SELECT * FROM attractions";
                        $query_location = $public->prepare($query_string);
                        $query_location->execute();
                        $location_obj = $query_location->get_result();
                        
                        // where process begins
                        $i = 0;
                        while($location_list = mysqli_fetch_array($location_obj)) {
                            $locations[$i][0] = $location_list["abbr"];
                            $locations[$i][1] = $location_list["name"];

                            // check visit status
                            $visit_string = "SELECT {$locations[$i][0]} AS visited FROM records WHERE username = ?";
                            $query_visit = $con->prepare($visit_string);  
                            $query_visit->bind_param("s", $_SESSION["username"]);
                            $query_visit->execute();
                            $visit = mysqli_fetch_array($query_visit->get_result());

                            $locations[$i][2] = $visit["visited"];
                            $i++;
                        }
                        
                        $max = $i;
                        $i = 0;
                        $isfull = 0;

                        while($i < $max) {
                            if($locations[$i][2] == 1) {
                                echo '
                                <div class="card-container">
                                    <div class="card" style="background-image: url(src/'.strtolower($locations[$i][0]).'.jpg)">                            
                                    </div>
                                    <div class="title">'.$locations[$i][1].'</div>
                                    <div class="options">
                                        <a class="info" href="attractions/view.php?id='.$locations[$i][0].'">More info</a>
                                        <a class="button" href="unvisit.php?id='.$locations[$i][0].'">Remove</a>
                                    </div>
                                </div>';
                                $isfull++;
                            }
                            $i++;
                        }

                        if($isfull == 0) {
                            echo '
                            <div class="empty">
                                <div>Go and enjoy the wonderful locations Xiamen has to offer. Once you have visited, hover on the attractions under "Not visited", and select "Mark visited".</div>
                            </div>';
                        }
                    ?>
                </div>
            </div>
            <div class="container">
                <div class="subheading">Not visited</div>
                <div class="flexbox outerflex">
                    <?php
                        $i = 0;

                        if($isfull == count($locations)) {
                            echo '
                            <div class="empty">
                                <div>You have visited every location. Congratulations!</div>
                            </div>';
                        } else {
                            while($i < $max) {
                            

                                if($locations[$i][2] == 0) {
                                    echo '
                                    <div class="card-container">
                                        <div class="card" style="background-image: url(src/'.strtolower($locations[$i][0]).'.jpg)">                            
                                        </div>
                                        <div class="title">'.$locations[$i][1].'</div>
                                        <div class="options">
                                            <a class="info" href="attractions/view.php?id='.$locations[$i][0].'">More info</a>
                                            <a class="button" href="visit.php?id='.$locations[$i][0].'">Mark visited</a>
                                        </div>
                                    </div>';
                                }
                                $i++;
                            }
                        }                        
                    ?>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div>Xiamen City Guide (2021)</div>
    </footer>
</body>
</html>