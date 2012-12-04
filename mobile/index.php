
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
                <a href="userscourses" data-ajax="false" data-role="button" data-icon="grid">What did you like?</a>
                <a href="allcourses" data-ajax="false" data-role="button" data-icon="grid">All Courses</a>
                <a href="selections/" data-ajax="false" data-role="button" data-icon="grid">Course Selector</a>
                <a href="courselist?semester=Fall2012&name=CPSC457" data-role="button" data-ajax="false" data-icon="grid">Course List</a>
                <a href="g" data-role="button" data-icon="grid">gLink</a>
                <a href="suggest" data-role="button" data-icon="grid">Suggestions</a>
                <a href="examplemessage?msg=Hey,%20this%20is%20a%20message" data-role="button" data-icon="grid">Example dynamic message</a>
                <a href="sqli-whereexamples" data-role="button" data-icon="grid" data-ajax="false">sqli.where() examples</a>
                <a href="listexample" data-role="button" data-icon="grid">Fancy List example</a>
                <a href="login/logout" data-ajax="false" data-role="button" data-icon="delete" data-theme="c">Log out</a>
            </div>
            <?php include('footer.php'); ?>
        </div>
    </body>
</html>