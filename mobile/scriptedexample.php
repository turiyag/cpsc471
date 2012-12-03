

<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div id="g" data-role="page" data-theme="a">
            <script>
                $(document).delegate("#g", "pageinit", function() {
                    
                });
            </script>
            <?php include('header.php');?>
            <div data-role="content">
            </div>
            <?php include('footer.php'); ?>
        </div>
    </body>
</html>