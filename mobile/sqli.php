<?php
    //If we have not yet created the $mysqli object
    if(!isset($mysqli)) {
        //Make a new MySQLi object that connects to the local computer, with the username 'cpsc471'
        //    and the password "ps3xy6NGwHTQj4Xm", and connects to the database "cpsc471"
        $mysqli = new mysqli("localhost", "cpsc471", "ps3xy6NGwHTQj4Xm","cpsc471");
        //If we couldn't connect, then die (ends execution) and print the error
        if ($mysqli->connect_error) {
            die('Connect Error [' . $mysqli->connect_errno . '] ' . $mysqli->connect_error);
        }
        
        /*
        Creates a where statement comparing strings from the input parameters to row data in the database
            $possible = An array of strings that corresponds to the data you want to query
            $compare = The comparison operator to use in each clause of the query
            $glue = The boolean operator used to glue the clauses together
            $pre = The value to prepend to the comparison string
            $post = The value to append to the comparison string
            
        Usage:
            See sqli-whereexamples.php (open it in a browser)
        */
        function where($possible, $compare = "=", $glue = "AND", $pre = "", $post = "") {
            //Using the global $mysqli connection
            global $mysqli;
            //Trim the spaces off of the $glue and $compare 
            //    and add them again, ensuring that nothing is over or under-spaced
            $glue = " " . trim($glue) . " ";
            $compare = " " . trim($compare) . " ";
            //If $possible is an array
            if (is_array($possible)) {
                //For each string in the array
                foreach ($possible as $val) {
                    //If the $_GET variable is set
                    if (isset($_GET[$val])) {
                        //Then add this one to the WHERE statement
                        //This could add "semester = 'Fall2012'"
                        $whereclauses[] = $val . $compare . "'" . $pre . $mysqli->real_escape_string($_GET[$val]) . $post . "'";
                    }
                }
                //If there were any clauses
                if (isset($whereclauses)){
                    //Return the compiled where statement
                    return " WHERE " . implode($glue, $whereclauses);
                } else {
                    //Otherwise return the empty string
                    return "";
                }
            //else if $possible is not an array
            } else {
                //If the $_GET variable exists
                if (isset($_GET[$possible])) {
                    //Return a WHERE statement with just this variable
                    return " WHERE " . $possible . $compare . "'" . $mysqli->real_escape_string($_GET[$possible]) . "'";
                } else {
                    //Otherwise, return nothing
                    return "";
                }
            }
        }
        
        /* Inserts a row into a table
            $tablename = A string containing the name of the table
            $columns = An array containing the names of the columns to insert into
            $values = An array of values to insert
        */
        function insertRow($tablename, $columns, $values) {
            //Using the global $mysqli connection
            global $mysqli;
            //Build a query
            $query = "INSERT INTO " . $tablename;
            $query .= " (`" . implode("`,`", $columns) . "`)";
            $query .= " VALUES (";
            foreach($values as $key => $val) {
                $query .= "'" . $mysqli->real_escape_string(decodeentities($val)) . "',";
            }
            $query = substr($query,0,strlen($query)-1);
            $query .= ")";
            //Query the database to insert the row
            $res = $mysqli->query($query);
            //Report errors as they occur
            if (!($res)) {
                print("<br />Error:" . $mysqli->error);
            }
            
            print("<p>$query</p>");
            
        }
        
        function decodeentities($str) {
            return html_entity_decode(preg_replace_callback("/(&#[0-9]+;)/", function($m) { return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES"); }, $str));
        }
        
    }
    /*
    ----------- EXAMPLE CODE ------------
    
    
    $qry = "INSERT INTO table (val1, val2, val3) VALUES ('first', '2nd', 'hey');";
    $res = $mysqli->query($qry);
    if ($res) {
        echo "Inserted!";
    } else {
        echo 'Error: ' . $mysqli->error;
    }
    
    $result = $mysqli->query("SELECT * FROM table");
    while ($row = $result->fetch_assoc()) {
        foreach($row as $key => $val) {
            echo "$key: $val";
        }
    }
    $result->free();
    $mysqli->close();
    */
?> 