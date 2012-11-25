<?php
    include('sqli.php');
    
    foreach(array("semester","subject","number","desc") as $val) {
        if(isset($_GET[$val])) {
            $whereclauses[] = "$val LIKE '" . $mysqli->real_escape_string($_GET[$val]) . "%'";
        }
    }
    
    $query = "SELECT `key`,`semester`,`subject`,`number`,`desc` FROM courses";
    if (isset($whereclauses)) {
        $query .= " WHERE " . implode(" AND ", $whereclauses);
    }
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
        $alljsons[] = json_encode($row);
    }
    if (isset($alljsons)) {
        print("[" . implode(",<br />", $alljsons) . "]");
    }
    $result->free();
    $mysqli->close();
?>