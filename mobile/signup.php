<?php
    include('sqli.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div id="signup" data-role="page" data-theme="a">
            <script>
            </script>
            <?php include('header.php');?>
            <div data-role="content">
                <label for="txtName">Username:</label>
                <input type="text" id="txtName" name="txtName" placeholder="john.doe123" />
                <label for="txtCourse">Course name:</label>
                <input type="search" id="txtCourse" name="txtCourse" placeholder="ex. CPSC471" data-theme="a" />
                <div id="results">
                </div>
                <div id="errorbox">
                </div>
            </div>
            <?php include('footer.php'); ?>
            <div id="popups">
            </div>
        </div>
    </body>
</html>