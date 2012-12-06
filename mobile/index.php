
<?php include("./login/enforcelogin.php"); ?>

<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div data-role="page" data-theme="a">
            <?php include('header.php');?>
            <div data-role="content">
                <a href="userscourses" data-ajax="false" data-role="button" data-icon="grid">Rate</a>
                <a href="selections/" data-ajax="false" data-role="button" data-icon="grid">Enroll</a>
                <a href="suggest/" data-ajax="false" data-role="button" data-icon="grid">Suggestions</a>
                <a href="login/logout" data-ajax="false" data-role="button" data-icon="delete" data-theme="c">Log out</a>
            </div>
            <?php include('footer.php'); ?>
        </div>
    </body>
</html>