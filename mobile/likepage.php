
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
            <div data-role="content">
                <h3>Rate <?php echo $_GET['course']; ?></h3>
                <div id="results">
                    <a data-ajax="false" data-role="button" href="setrating?course=<?php echo $_GET['course']; ?>&rating=1"><img src="img/1star.png" /></a>
                    <a data-ajax="false" data-role="button" href="setrating?course=<?php echo $_GET['course']; ?>&rating=2"><img src="img/2star.png" /></a>
                    <a data-ajax="false" data-role="button" href="setrating?course=<?php echo $_GET['course']; ?>&rating=3"><img src="img/3star.png" /></a>
                    <a data-ajax="false" data-role="button" href="setrating?course=<?php echo $_GET['course']; ?>&rating=4"><img src="img/4star.png" /></a>
                    <a data-ajax="false" data-role="button" href="setrating?course=<?php echo $_GET['course']; ?>&rating=5"><img src="img/5star.png" /></a>
                    <a data-ajax="false" data-role="button" data-icon="delete" data-theme="c" href="setrating?course=<?php echo $_GET['course']; ?>&rating=0">Remove course</a>
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