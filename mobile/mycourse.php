
<?php
    include("./login/enforcelogin.php");
    include('sqli.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div id="userscourses" data-role="page" data-theme="a">
            <script>
                $(document).delegate("#userscourses", "pageinit", function() {
                });
            </script>
            <?php include('header.php');?>
                <?php if (!isset($_GET['course'])) { ?>
                    <div data-role="header" data-theme="c">
                        <h1>Error</h1>
                    </div>
                    <div data-role="content">
                        <p>No course selected</p>
                    </div>
                <?php } else { ?>
                    <div data-role="header" data-theme="e">
                        <h1><?php echo $_GET['course']; ?></h1>
                    </div>
                    <div data-role="content">
                        <ul style="margin:20px 0px;" data-role="listview">
                            <?php
                                $query = "SELECT stars FROM userscourses";
                                $query .= " WHERE user='" . $_SESSION['username'] . "'";
                                $query .= " AND course='" . $mysqli->real_escape_string($_GET['course']) . "'";
                                $result = $mysqli->query($query);
                                if($row = $result->fetch_assoc()) {
                                    echo '<li><a href="likepage?course=' . $_GET['course'] . '"><div><img src="img/' . $row['stars'] . 'star18.png" /></div></a></li>';
                                } else {
                                    echo '<li><a href="likepage?course=' . $_GET['course'] . '">Course not rated yet. Click here to rate.</a></li>';
                                }
                                $query = "SELECT * FROM coursereqs WHERE course='" . $mysqli->real_escape_string($_GET['course']) . "'";
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
                        <a data-ajax="false" data-role="button" data-icon="delete" data-theme="c" href="setrating?course=<?php echo $_GET['course']; ?>&rating=0">Remove course</a>
                    </div>
                <?php } ?>
            <?php include('footer.php'); ?>
            <div id="popups">
            </div>
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