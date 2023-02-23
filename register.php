<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">    
    <link rel="stylesheet" href="css/register.css">

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
        <div class="outer">
            <div class="container">
                <div class="nav-title">
                    Register
                </div>
                <?php
                    require('db.php');
                    // update the database for new registrants           

                    if (isset($_REQUEST['username'])){
                        // select unique id
                        $query_max_str = "SELECT MAX(id) as maxid from accounts";
                        $max_id_query = $con->prepare($query_max_str);
                        $max_id_query->execute();
                        $max_id_obj = $max_id_query->get_result();

                        if(mysqli_num_rows($max_id_obj) > 0) {
                            $max_id_arr = mysqli_fetch_array($max_id_obj);
                            $max_id = $max_id_arr["maxid"];
                            $max_id++;
                        } else {
                            $max_id = 1;
                        }
                        
                        $username = stripslashes($_REQUEST['username']); // removes backslashes
                        $username = mysqli_real_escape_string($con, $username); //escapes special characters in a string
                        
                        // check if matching username exists
                        $query_str = "SELECT * FROM accounts WHERE username = ?";
                        $string_query = $con->prepare($query_str);
                        $string_query->bind_param("s", $username);
                        $string_query->execute();
                        $str_obj = $string_query->get_result();

                        if(mysqli_num_rows($str_obj) == 0) {
                            $status = 0;
                        } else {
                            $status = 1;
                        }
                        
                        if($status == 0) {
                            $email = stripslashes($_REQUEST['email']);
                            $email = mysqli_real_escape_string($con, $email);

                            // check if matching email exists
                            $query_str = "SELECT * FROM accounts WHERE email = ?";
                            $string_query = $con->prepare($query_str);
                            $string_query->bind_param("s", $email);
                            $string_query->execute();
                            $str_obj = $string_query->get_result();

                            if(mysqli_num_rows($str_obj) == 0) {
                                $status = 0;
                            } else {
                                $status = 1;
                            }

                            if($status == 0) {
                                $password = stripslashes($_REQUEST['password']);
                                $password = mysqli_real_escape_string($con,$password);
                    
                                $trn_date = date("Y-m-d H:i:s");
                                $query = "INSERT into accounts (id, username, password, email, trn_date) VALUES ('$max_id', '$username', '".md5($password)."', '$email', '$trn_date')";
                                $result = mysqli_query($con,$query);

                                if($result) {
                                    $record_string = "INSERT INTO records (username, gulangyu, temple, garden, fortress, jimei, tulou, zhongshan, huandao, xiamenu) VALUES (?, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
                                    $rec_string_query = $con->prepare($record_string);
                                    $rec_string_query->bind_param("s", $username);
                                    $rec_string_query->execute();

                                    echo "<div class='success'>You are registered successfully. Click here to <a href='login.php'>Login</a></div>";
                                } else {
                                    echo "<div class='error'>An error occurred. Try signing up again. <a href='login.php'>Login</a></div>";
                                }
                            } else {
                                echo "<div class='error'>This email already existed. Log in here. <a href='login.php'>Login</a></div>";
                            }
                        } else {
                            echo "<div class='error'>This username already existed. Log in here. <a href='login.php'>Login</a></div>";
                        }
                        
                    } else {                    
                ?>
                <form method="post" name="register" action="" autocomplete="off">
                    <div class="sub-container">
                        <div id="register" class="register"><a href="login.php">Return to login</a></div>
                    </div>
                    <div class="login-container">
                        <div class="login-info">
                            <input type="text" id="username" name="username" required>
                            <div class="label label-large" id="userlabel">Username</div>
                        </div>
                        <div style="height: 15px;"></div>
                        <div class="login-info">
                            <input type="email" id="email" name="email" required>
                            <div class="label label-large" id="elabel">Email</div>
                        </div>
                        <div style="height: 15px;"></div>
                        <div class="login-info">
                            <input type="password" id="password" name="password" required>
                            <div class="label label-large" id="pwlabel">Password</div>
                        </div>
                        <div style="height: 15px;"></div>
                        <div class="submit">
                            <button class="r-button button" type="submit" value="submit">
                                <div class="ripple js-ripple">
                                    <span class="ripple-effect">
                                    </span>                        
                                </div>
                                Sign up
                            </button>
                        </div>
                    </div>
                </form>
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