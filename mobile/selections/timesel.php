<?php
    //session_start();
    //session_destroy();
    session_start();
    $_SESSION['period'] = $_GET['key'];
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
                <h1>Times for selected period</h1>
            </div>

            <div data-role="content">
                <ul data-role="listview" style="margin:20px 0px;">
                    <?php
                        //Get the list of all available semesters
                        //And store it in the string 'semesteroptions'  SELECT `key`, `type`, `number`, `room`, `instructor` FROM `periods` WHERE 1
                        $query = "SELECT `day`, `fromtime`, `totime`, `fromdate`, `todate` FROM `times` WHERE `period`=";
                        $query .= "'" . $_SESSION['period'] . "'";
                        $result = $mysqli->query($query);
                        //For the first result exists
                        if ($row = $result->fetch_assoc()) {
                            do {
                                //$link = $row['key'];
                                //$human = "<h3>" . $row['instructor'] . "</h3>";
                                $human = "<p>" . $row['day'] . "</p>";
                                $human .= "<p>" . $row['fromtime'] . " - " . $row['totime'] . "</p>";
                                print('<li data-theme="e">' . $human . '</li>');
                            } while ($row = $result->fetch_assoc());
                        } else {
                            print('<li>No semester could be found</li>');
                        }
                    ?>
                </ul>
                <a data-ajax="false" data-role="button" data-icon="plus" data-theme="d" href="register">Add</a>
            </div>
            <?php include('../footer.php'); ?>
        </div>
    </body>
</html>