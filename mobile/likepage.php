
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
        <div id="likepage" data-role="page" data-theme="a">
            <script>
                $(document).delegate("#userscourses", "pageinit", function() {
                
                });
                
            </script>
            <?php include('header.php');?>
            <div data-role="header" data-theme="e">
                <h3>Rate <?php echo $_GET['course']; ?></h3>
            </div>
            <div data-role="content">
                <div id="results">
                    <a data-ajax="false" data-role="button" href="setrating?course=<?php echo $_GET['course']; ?>&rating=1"><img src="img/1star18.png" /></a>
                    <a data-ajax="false" data-role="button" href="setrating?course=<?php echo $_GET['course']; ?>&rating=2"><img src="img/2star18.png" /></a>
                    <a data-ajax="false" data-role="button" href="setrating?course=<?php echo $_GET['course']; ?>&rating=3"><img src="img/3star18.png" /></a>
                    <a data-ajax="false" data-role="button" href="setrating?course=<?php echo $_GET['course']; ?>&rating=4"><img src="img/4star18.png" /></a>
                    <a data-ajax="false" data-role="button" href="setrating?course=<?php echo $_GET['course']; ?>&rating=5"><img src="img/5star18.png" /></a>
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