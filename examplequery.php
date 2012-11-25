<?php

    //Connect to MySQL server, with the username 'cpsc471' and password 'homepage', to the database called 'cpsc471'
    $mysqli = new mysqli("localhost", "cpsc471", "homepage","cpsc471");
    //If there is a connection error, stop executing the script
    if ($mysqli->connect_error) {
        //Print out the connection error
        die('Connect Error [' . $mysqli->connect_errno . '] ' . $mysqli->connect_error);
    }
    
    //Set a string variable
    $query = "SELECT * FROM cars WHERE make='dodge'";
    //Equivalent to '$query = $query + " example"'
    //The period is the concatenation operator
    //$query .= " example";
    //Query the server, which will return a PHP Object that contains the results of the query
    $result = $mysqli->query($query);
    
    //Set $row to the next line. If it returns null (there is no next line), exit the loop.
    while ($row = $result->fetch_assoc()) {
        //For each row
        //Output some HTML
        echo '<div class="infoblock">';
        //For each column, set $key to be equal to the column name and set $val to be the value in the cell of that column
        foreach($row as $key => $val) {
            //Output some HTML
            echo "<p>$key: $val</p>";
        }
        //Remember to close your HTML tags
        echo "</div>";
    }
    //Free the memory
    $result->free();
    //Close the connection
    $mysqli->close();

?> 