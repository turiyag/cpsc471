<?php
    include('sqli.php');
    
    //Set a string variable
    $query = "SELECT * FROM";
    //Equivalent to '$query = $query + " example"'
    //The period is the concatenation operator
    $query .= " example";
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