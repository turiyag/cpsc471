<?php
    if(!isset($mysqli)) {
        $mysqli = new mysqli("localhost", "cpsc471", "ps3xy6NGwHTQj4Xm","cpsc471");
        if ($mysqli->connect_error) {
            die('Connect Error [' . $mysqli->connect_errno . '] ' . $mysqli->connect_error);
        }
    }
    
    function where($possible, $compare = "=", $glue = "AND", $pre = "", $post = "") {
        global $mysqli;
        $glue = " " . trim($glue) . " ";
        $compare = " " . trim($compare) . " ";
        if (is_array($possible)) {
            foreach ($possible as $val) {
                if (isset($_GET[$val])) {
                    $whereclauses[] = $val . $compare . "'" . $pre . $mysqli->real_escape_string($_GET[$val]) . $post . "'";
                }
            }
            if (isset($whereclauses)){
                return " WHERE " . implode($glue, $whereclauses);
            } else {
                return "";
            }
        } else {
            if (isset($_GET[$possible])) {
                return " WHERE " . $possible . $compare . "'" . $mysqli->real_escape_string($_GET[$possible]) . "'";
            } else {
                return "";
            }
        }
    }
    
    function insertRow($tablename, $columns, $values) {
        global $mysqli;
        $query = "INSERT INTO " . $tablename;
        $query .= " (`" . implode("`,`", $columns) . "`)";
        $query .= " VALUES (";
        foreach($values as $key => $val) {
            $query .= "'" . $mysqli->real_escape_string(decodeentities($val)) . "',";
        }
        $query = substr($query,0,strlen($query)-1);
        $query .= ")";
        $res = $mysqli->query($query);
        if (!($res)) {
            print("<br />Error!");
        }
        /*
        print("<p>$query</p>");
        */
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