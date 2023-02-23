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
    <title>History</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/history.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <nav class="nav primary">
        <div class="inner-nav">
            <div><a href="landing.php">XIAMEN</a></div>
            <ul>
                <a href="attractions.php"><li>Attractions</li></a>
                <li class="active">History</li>
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
        <div class="module">
            <div class="heading title">History of Xiamen</div>
            <div class="subheading">China is rich with dynasties. Due to this, only the major or involved dynasties will be listed here.</div>
            <div class="interact">
                <div class="l-cont l-1">
                    <div class="marker"></div>
                    <div class="label left">Year 266: Jin Dynasty</div>
                </div>
                <div class="p-cont p-1">
                    <div class="pointer"></div>
                </div>
                <div class="d-cont d-1 d-left animate">
                    <div class="container">
                        <div class="title">Year 282</div>
                        <div>Organised as Tong'an County under Jin, but loses status soon after.</div>
                    </div>
                </div>
                <div class="l-cont l-2">
                    <div class="marker"></div>
                    <div class="label right">Year 581: Sui Dynasty</div>
                </div>
                <div class="l-cont l-3">
                    <div class="marker"></div>
                    <div class="label left">Year 618: Tang Dynasty</div>
                </div>
                <div class="l-cont l-4">
                    <div class="marker"></div>
                    <div class="label left">Year 907-960: Five Dynasties and 10 Kingdoms</div>
                </div>
                <div class="l-cont l-5">
                    <div class="marker"></div>
                    <div class="label left">Year 923: Later Tang Dynasty</div>
                </div>
                <div class="p-cont p-2">
                    <div class="pointer"></div>
                </div>
                <div class="d-cont d-2 d-right">
                    <div class="container">
                        <div class="title">Year 933</div>
                        <div>Reestablished under the Later Tang Dynasty.</div>
                    </div>
                </div>
                <div class="l-cont l-6">
                    <div class="marker"></div>
                    <div class="label left">Year 960: Song Dynasty</div>
                </div>
                <div class="l-cont l-7">
                    <div class="marker"></div>
                    <div class="label left">Year 1279: Yuan Dynasty</div>
                </div>
                <div class="l-cont l-8">
                    <div class="marker"></div>
                    <div class="label left">Year 1368: Ming Dynasty</div>
                </div>
                <div class="p-cont p-3">
                    <div class="pointer"></div>
                </div>
                <div class="d-cont d-3 d-left">
                    <div class="container">
                        <div class="title">Year 1387</div>
                        <div>Prior to 1387, the settlement on southeastern shore of Xiamen Island was developed as a seaport during the Song Dynasty. At 1387, attacks were launched by pirates. A fortress was erected by Ming (Ming's Dynasty) which gave Xiamen its name.</div>
                    </div>
                </div>
                <div class="l-cont l-9">
                    <div class="marker"></div>
                    <div class="label left">Year 1644: Qing Dynasty</div>
                </div>
                <div class="p-cont p-4">
                    <div class="pointer"></div>
                </div>
                <div class="d-cont d-4 d-right">
                    <div class="container">
                        <div class="title">Year 1650</div>
                        <div>Southern Ming loyalists such as Koxinga launched attacks from Xiamen against invading Qing's Han Bannermen. Later on, the base fell from Qing and Dutch invasion.</div>
                    </div>
                </div>
                <div class="p-cont p-5">
                    <div class="pointer"></div>
                </div>
                <div class="d-cont d-5 d-left">
                    <div class="container">
                        <div class="title">Year 1680</div>
                        <div>East India Company traded extensively with Xiamen's port. Xiamen became a subprefecture in 1680.</div>
                    </div>
                </div>
                <div class="p-cont p-6">
                    <div class="pointer"></div>
                </div>
                <div class="d-cont d-6 d-right">
                    <div class="container">
                        <div class="title">Year 1800+</div>
                        <div>Xiamen was equipped with sturdy city walls of around 14 km (9 miles) in circumference. It had two cities; inner and outer. The inner harbour was also well-fortified. After the First Opium War (1839 - 1842), Xiamen's defenses were further strengthened.</div>
                    </div>
                </div>
                <div class="p-cont p-7">
                    <div class="pointer"></div>
                </div>
                <div class="d-cont d-7 d-left">
                    <div class="container">
                        <div class="title">Year 1841</div>
                        <div>After several attempts to capture Xiamen by the British, the city was abandoned, then fell on 27 August. The next year, the Treaty of Nanjing made Xiamen a port opened for British trade.</div>
                    </div>
                </div>
                <div class="l-cont l-10">
                    <div class="marker"></div>
                    <div class="label left">Year 1912: Republic of China</div>
                </div>
                <div class="p-cont p-8">
                    <div class="pointer"></div>
                </div>
                <div class="d-cont d-8 d-right">
                    <div class="container">
                        <div class="title">Year 1938</div>
                        <div>During the Second World War, Japan captured Xiamen Island.</div>
                    </div>
                </div>
                <div class="p-cont p-9">
                    <div class="pointer"></div>
                </div>
                <div class="l-cont l-11">
                    <div class="marker"></div>
                    <div class="label left">Year 1949: People's Republic of China</div>
                </div>
                <div class="d-cont d-9 d-left">
                    <div class="container">
                        <div class="title">Year 1949</div>
                        <div>During the Chinese Civil War, the communists captured Xiamen in October 1949. It became a provincially adminstered city.</div>
                    </div>
                </div>
                <div class="p-cont p-10">
                    <div class="pointer"></div>
                </div>
                <div class="d-cont d-10 d-right">
                    <div class="container">
                        <div class="title">Year 1980</div>
                        <div>PRC Leader Deng Xiaoping commenced an Opening Up Policy. Xiamen was then made a special economic zones attracting foreign investments.</div>
                    </div>
                </div>
                <div class="p-cont p-11">
                    <div class="pointer"></div>
                </div>
                <div class="d-cont d-11 d-left">
                    <div class="container">
                        <div class="title">Year 1988</div>
                        <div>Xiamen was promoted to a sub-provincial status.</div>
                    </div>
                </div>
                <div class="p-cont p-12">
                    <div class="pointer"></div>
                </div>
                <div class="d-cont d-12 d-right">
                    <div class="container">
                        <div class="title">Current</div>
                        <div>Xiamen was ranked 2nd most suitable city for living in China in 2006. It further received "most romantic leisure city" in 2011.</div>
                    </div>
                </div>
                <div class="vertical"></div>
                <div class="mov-v" id="mov-v"></div>
                <!-- <div class="v-c"></div>     -->
            </div>
        </div>
    </section>
    <footer>
        <div>Xiamen City Guide (2021)</div>
    </footer>
    <script src="js/interactive.js"></script>
</body>
</html>