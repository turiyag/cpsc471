<?php
    include('../sqli.php');
    session_start();
    if(isset($_SESSION['period']) && isset($_SESSION['username'])) {
        $query = "INSERT INTO `enrolments`(`key`,`period`,`username`) VALUES (";
        $query .= '"' . $mysqli->real_escape_string($_SESSION['period']) . "~" . $mysqli->real_escape_string($_SESSION['username']) . '",';
        $query .= '"' . $mysqli->real_escape_string($_SESSION['period']) . '",';
        $query .= '"' . $mysqli->real_escape_string($_SESSION['username']) . '")';
        $result = $mysqli->query($query);
        $_SESSION['enrolmentmessage'] = "Enrolled in " . $_SESSION['period'];
    } else {
        $_SESSION['enrolmentmessage'] = "Bad request";
    }
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/projects/cpsc471project/mobile/selections/coursesel');
?>