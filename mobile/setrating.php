<?php
    include('sqli.php');
    session_start();
    if(isset($_GET['course']) && isset($_GET['rating']) && isset($_SESSION['username'])) {
        if($_GET['rating'] == "0") {
            $query = "DELETE FROM userscourses WHERE usercourse='" . $mysqli->real_escape_string($_SESSION['username']) . ":" . $mysqli->real_escape_string($_GET['course']) . "'";
            $result = $mysqli->query($query);
            $_SESSION['userscoursesmsg'] = "Removed " . $_GET['course'] . " from the our records";
        } else {
            $query = "INSERT INTO userscourses (user,course,usercourse,stars) VALUES (";
            $query .= "'" . $mysqli->real_escape_string($_SESSION['username']) . "',";
            $query .= "'" . $mysqli->real_escape_string($_GET['course']) . "',";
            $query .= "'" . $mysqli->real_escape_string($_SESSION['username']) . ":" . $mysqli->real_escape_string($_GET['course']) . "',";
            $query .= "'" . $mysqli->real_escape_string($_GET['rating']) . "') ";
            $query .= "ON DUPLICATE KEY UPDATE stars=" . $mysqli->real_escape_string($_GET['rating']);
            $result = $mysqli->query($query);
            $_SESSION['userscoursesmsg'] = "Rated " . $_GET['course'] . " at " . $_GET['rating'] . " stars";
        }
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/projects/cpsc471project/mobile/userscourses');
    } else {
        $_SESSION['userscoursesmsg'] = "Bad request";
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/projects/cpsc471project/mobile/userscourses');
    }
?>