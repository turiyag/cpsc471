<?php

    $con = mysql_connect("localhost","USER","PASSWORD");
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("DBNAME", $con);

    $myQuery = "INSERT INTO table (val1, val2, val3) VALUES ('" . $_POST['val1'] . "', '" . $_POST['val2'] . "','" . $_POST['val3'] . "')";

    mysql_query($myQuery);

    $result = mysql_query("SELECT * FROM table ORDER BY val1");

    while($row = mysql_fetch_array($result)) {
        echo $row['val1'] . ":" . $row['val2'];
    }

    mysql_close($con);
    
    

?> 