<?php
    require('db.php');
    include("auth.php");

    if(isset($_SESSION["username"])) {
        $location = $_GET["id"];

        $date = new DateTime();
        $current = $date->format('Y-m-d H:i:s');

        $visited_string = "UPDATE records SET {$location} = 1, {$location}_visit = ? WHERE username = ?";
        $query_visited = $con->prepare($visited_string);
        $query_visited->bind_param("ss", $current, $_SESSION["username"]);
        $query_visited->execute();

        header("Location: logbook.php");
    } else {
        header("Location: ../error.php");
    }
?>