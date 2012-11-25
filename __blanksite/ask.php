<?php


    $mysqli = new mysqli("localhost", "cpsc471", "homepage","cpsc471");
    if ($mysqli->connect_error) {
        die('Connect Error [' . $mysqli->connect_errno . '] ' . $mysqli->connect_error);
    }
    
    
    $result = $mysqli->query("SELECT * FROM cars WHERE make='" . $_POST['make'] . "'");
    while ($row = $result->fetch_assoc()) {
        foreach($row as $key => $val) {
            echo "$key: $val";
        }
    }
    $result->free();
    $mysqli->close();
    

//    echo "hi";
//    echo "SELECT * FROM cars WHERE make='" . $_POST['make'] . "'";
    
?> 