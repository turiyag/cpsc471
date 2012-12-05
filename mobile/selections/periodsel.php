<?php
    //session_start();
    //session_destroy();
    session_start();
    include('../sqli.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div id="periodsel" data-role="page" data-theme="a">
            <script>
                $(document).delegate("#periodsel", "pageinit", function() {
        
                });
            </script>
            <?php include('../header.php');?>
            <div data-role="header" data-theme="e">
                <h1>Select a period</h1>
            </div>

            <div data-role="content">
                <ul data-role="listview">
                    <?php
                        //Get the list of all available semesters
                        //And store it in the string 'semesteroptions'  SELECT `key`, `type`, `number`, `room`, `instructor` FROM `periods` WHERE 1
                        $query = "SELECT `key`, `type`, `number`, `room`, `instructor` FROM `periods` WHERE `course`=";
                        $query .= "'" . $_GET['semester'] . ':' . $_GET['course'] . "'";
                        $result = $mysqli->query($query);
                        //For the first result exists
                        if ($row = $result->fetch_assoc()) {
                            do {
                                 $link = $row['key'];
                                 $human = "<h3>" . $row['instructor'] . "</h3>";
                                 $human .= "<p>" . $row['type'] . " - " . $row['number'] . "</p>";
                                 print('<li><a href="timesel?key=' . $link . '">' . $human . '</a></li>');
                            } while ($row = $result->fetch_assoc());
                        } else {
                            print('<li>No periods for this course </li>');
                        }
                    ?>
                </ul>
            </div>
            <?php include('../footer.php'); ?>
        </div>
    </body>
</html>