<?php
    //Include MySQL related functions and create the $mysqli variable, connected to the database
    include('sqli.php');
    
    //Build a query (simply a string)
    //SELECT all distinct rows containing the name and description of the course from the 'courses' table, 
    $query = "SELECT DISTINCT `name`, `desc` FROM courses";
    //The where function is defined in sqli.php
    //$query .= //Concatenate the returned value of the where function with the value in $query (like Java's +=)
    //where(array of strings of possible variables, comparison operator, boolean operator to connect comparisons,
    //    string to prepend to the value, string to append to the value
    //This statement says "make a WHERE statement that contains semester and name (if they are given), 
    //    and compares the values there to the beginning of the values in the database
    //Given the values $_GET['semester'] = 'Fall2012' and $_GET['name'] = 'CPSC471'
    //This would return " WHERE semester LIKE 'Fall2012%' AND name LIKE "CPSC471%"
    //If $_GET['semester'] was not set, and $_GET['name'] = 'CPSC'
    //This would return " WHERE name LIKE 'CPSC%'
    //If neither value was set
    //This would return ""
    $query .= where(array("semester","name"), "LIKE", $glue = "AND", $pre = "", $post = "%");
    //Finally concatenate a limit to the end of the query (this limits to 30 elements)
    $query .= " LIMIT 0,30";
    //Print the query
    //print('<p class="hidden">' . $query . '</p>');
    
    
    
    //Actually query the database, and store the results in the $result variable
    $result = $mysqli->query($query);
    //While we can set $row to the next row
    while ($row = $result->fetch_assoc()) {
        //Add a string value to the end of the array, based on the values in the 
        //    name and desc columns of this row
        //Ex. Append '"CPSC471":"Data Base Operations"'
        $alljsons[] = '"' . $row['name'] . '":"' . $row['desc'] . '"';
    }
    //If $alljsons exists (at least one row was returned in the query)
    if (isset($alljsons)) {
        //Make the JSON object out of the keys and values in $alljsons
        //    and print it to the output
        print('{' . implode(',', $alljsons) . '}');
    } else {
        //Just return an empty JSON object
        print('{}');
    }
    //Free the result set from memory
    $result->free();
    //Close the MySQL connection
    $mysqli->close();
?>