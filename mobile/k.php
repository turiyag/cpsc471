<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div id="k" data-role="page" data-theme="a">
            <script>
                $(document).delegate("#k", "pageinit", function() {
					//$.get("courselist", {semester:"Fall2012", name:"CPSC457"}, function (data){
						alert("bing");
					//}, "json");
                });
            </script>
            <?php include('header.php');?>
            <div data-role="content">
            </div>
            <?php include('footer.php'); ?>
        </div>
    </body>
</html>