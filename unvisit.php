<?php
    require('db.php');
    include("auth.php");

    if(isset($_SESSION["username"])) {
        $location = $_GET["id"];

        $visited_string = "UPDATE records SET {$location} = 0, {$location}_visit = NULL WHERE username = ?";
        $query_visited = $con->prepare($visited_string);
        $query_visited->bind_param("s", $_SESSION["username"]);
        $query_visited->execute();

        header("Location: logbook.php");
    } else {
        header("Location: ../error.php");
    }
?>