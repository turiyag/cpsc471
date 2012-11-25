<?php
    include('sqli.php');
    
    $query = "SELECT DISTINCT `name`, `desc` FROM courses";
    $query .= where(array("semester","name"), "LIKE", $glue = "AND", $pre = "", $post = "%");
    $query .= " LIMIT 0,30";
    //print('<p class="hidden">' . $query . '</p>');
    
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
        $alljsons[] = $row['name'] . '":"' . $row['desc'];
    }
    if (isset($alljsons)) {
        print('{"' . implode('","', $alljsons) . '"}');
    } else {
        print('{}');
    }
    $result->free();
    $mysqli->close();
?>