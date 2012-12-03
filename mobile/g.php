
<?php include("./login/enforcelogin.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div id="gellert" data-role="page" data-theme="a">
            <script>
                $(document).delegate("#gellert", "pageinit", function() {
					$.get("courselist", {semester:"Fall2012", name:"CPSC457"}, function (data){
						//alert(data["CPSC457"]);
					}, "json");
                });
				var someObj = {one:"hat",sdh:"pants",x:5,y:"20"};
				alert(someObj.x + someObj.y)
            </script>
            <?php include('header.php');?>
            <div data-role="content">
            </div>
            <?php include('footer.php'); ?>
        </div>
    </body>
</html>