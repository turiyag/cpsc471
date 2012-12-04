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
        <div id="login" data-role="page" data-theme="a">
            <script>
                $(document).delegate("#login", "pageinit", function() {
                    <?php echo isset($_SESSION['loginerror']) ? "$(':password').focus();" : "$(':text').focus();"; ?>
                
                }
            </script>
            <?php include('../header.php');?>
            <div data-role="header" data-theme="e">
                <h1>Select a semester</h1>
            </div>

            <div data-role="content">
                <ul data-role="listview">
                    <?php
                        //Get the list of all available semesters
                        //And store it in the string 'semesteroptions'
                        $query = "SELECT DISTINCT `semester` FROM courses";
                        $result = $mysqli->query($query);
                        //For the first result, if it exists
                        if ($row = $result->fetch_assoc()) {
                            do {
                                 $link = $row['semester'];
                                 $human = substr($row['semester'], 0, -4) . ' ' . substr($row['semester'],-4);
                                 print('<li><a href="coursesel?semester="' . $link . '">' . $human . '</a></li>');
                            } while ($row = $result->fetch_assoc());
                        } else {
                            //Die if there aren't any semesters
                            die("Error: No courses present");
                        }
                    ?>
                </ul>
            </div>
            <?php include('../footer.php'); ?>
        </div>
    </body>
</html>