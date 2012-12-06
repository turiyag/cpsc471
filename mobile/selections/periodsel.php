<?php
    //session_start();
    //session_destroy();
    session_start();
    if (isset($_GET['course'])) {
        $_SESSION['course'] = $_GET['course'];
    }
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
            <div data-role="content">
                <a href="coursesel" data-role="button" data-icon="arrow-l">Select another course</a>
            </div>
            <div data-role="header" data-theme="e">
                <h1>Course Information</h1>
            </div>

            <div data-role="content">
                <ul data-role="listview">
                    <?php
                        $query = "SELECT * FROM coursereqs WHERE course='" . $mysqli->real_escape_string($_SESSION['course']) . "'";
                        $result = $mysqli->query($query);
                        if($row = $result->fetch_assoc()) {
                            liIfSet('Summary',$row['minidesc']);
                            liIfSet('Description',$row['desc']);
                            liIfSet('Prerequisites',$row['prereq']);
                            liIfSet('Corequisites',$row['coreq']);
                            liIfSet('Antirequisites',$row['antireq']);
                            liIfSet('Notes',$row['note']);
                            liIfSet('Also Known As',$row['aka']);
                            liIfSet('Repeatable',$row['repeat']);
                            liIfSet('WARNING',$row['nogpa']);
                        } else {
                            echo '<li>Course could not be found</li>';
                        }
                    ?>
                </ul>
            </div>
            <div data-role="header" data-theme="e">
                <h1>Period Enrolment</h1>
            </div>

            <div data-role="content">
                <ul data-role="listview">
                    <?php
                        //Get the list of all available semesters
                        //And store it in the string 'semesteroptions'  SELECT `key`, `type`, `number`, `room`, `instructor` FROM `periods` WHERE 1
                        $query = "SELECT `key`, `type`, `number`, `room`, `instructor` FROM `periods` WHERE `course`=";
                        $query .= "'" . $_SESSION['semester'] . ':' . $_SESSION['course'] . "'";
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
<?php
    function liIfSet($head, $data) {
        if (isset($data)) {
            if ($data != "") {
                echo '<li data-theme="e"><h3>' . $head . '</h3><p>' . $data . '</p></li>';
            }
        }
    }
?>