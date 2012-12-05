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
        <div id="timesel" data-role="page" data-theme="a">
            <script>
                $(document).delegate("#timesel", "pageinit", function() {
        
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
                        $query = "SELECT `day`, `fromtime`, `totime`, `fromdate`, `todate` FROM `times` WHERE `period`=";
                        $query .= "'" . $_GET['key'] . "'";
                        $result = $mysqli->query($query);
                        //For the first result exists
                        if ($row = $result->fetch_assoc()) {
                            do {
                                 //$link = $row['key'];
                                 //$blah = "<h3>" . $row['instructor'] . "</h3>";
                                 //$blah .= "<p>" . $row['type'] . " - " . $row['number'] . "</p>";
                                 print('<li data-theme="e">' . "blah" . '</li>');
                            } while ($row = $result->fetch_assoc());
                        } else {
                            print('<li>No semester could be found</li>');
                        }
                    ?>
                </ul>
            </div>
            <?php include('../footer.php'); ?>
        </div>
    </body>
</html>