
<?php include("./login/enforcelogin.php"); ?>

<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div data-role="page" data-theme="a">
            <?php include('header.php');?>
            <?php
                if (isset($_SESSION['signupmsg'])) {
            ?>
                    <ul style="margin:15px;" data-role="listview" data-theme="d">
                        <li>
                            <?php echo $_SESSION['signupmsg']; ?>
                        </li>
                        <li>
                            Start by rating the courses you've loved in the rate section, then go on to enroll in some courses, or look at the suggestions we've prepared for you.
                        </li>
                    </ul>
            <?php
                    unset($_SESSION['signupmsg']);
                }
            ?>
            <div data-role="content">
                <a href="userscourses" data-ajax="false" data-role="button" data-icon="grid">Rate</a>
                <a href="selections/" data-ajax="false" data-role="button" data-icon="grid">Enroll</a>
                <a href="suggest" data-ajax="false" data-role="button" data-icon="grid">Suggestions</a>
                <a href="login/logout" data-ajax="false" data-role="button" data-icon="delete" data-theme="c">Log out</a>
            </div>
            <?php include('footer.php'); ?>
        </div>
    </body>
</html>