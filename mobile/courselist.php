<?php
    include('sqli.php');

    
    $query = "SELECT `desc` FROM `courses`";
    $query .= where(array("semester","name"));
    
    $result = $mysqli->query($query);
    
    
    
    if($row = $result->fetch_assoc()) {
        print('{"' . $_GET["name"] . '":{ "desc":"' . $row["desc"] . '",');
        $subQuery='SELECT `type`, `number`, `group`, `room`, `instructor` FROM `periods` WHERE `course`="';
        $subQuery .= $_GET["semester"] . ":" . $_GET["name"] . '"';
        $subResult = $mysqli->query($subQuery);
        
        print('"periods":[');
        
        while($subQueryRow = $subResult->fetch_assoc()) {
            $arrayStuff[] = '{"type":"' . $subQueryRow["type"] . '","number":"' . $subQueryRow["number"] . '","group":"' . $subQueryRow["group"] . '","room":"' . $subQueryRow["room"] . '","instructor":"' . $subQueryRow["instructor"] . '"}';
        }
        $subResult->free();
        print(implode($arrayStuff, ","));
        print("]}}");
        
    }
    else {
        print("{}");
    }
    
    
    
        
//        print($row["desc"]);
//        $alljsons[] = json_encode($row);
//    if (isset($alljsons)) {
//        print("[" . implode(",<br />", $alljsons) . "]");
//    }
    $result->free();
    $mysqli->close();
?>