<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Always specify a DOCTYPE and an XML Specification --> 
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- The head contains the various 'extras' your page needs to work properly --> 
<head>
    <!-- This runs the 'header.php' script file and outputs the result (open the file to see what is inside) --> 
    <?php include 'header.php'; ?>
    <!-- This is another way of getting javascript into your web page --> 
    <!-- This Javascript doesn't actually do anything, but is only here as an example --> 
    <script type="text/javascript">
        $(function() {
            //$(".infoblock") selects every HTML element with the class "infoblock"
            //.hover(f1,f2) runs a function on every selected element when the mouse moves over it (f1), and runs a second function when the mouse leaves (f2)
            $(".infoblock").hover(function() {
                //When the mouse enters the object, set the background color to a light grey, and the text to a dark grey
                $(this).css({"background":"#CCC","color":"#333"});
            }, function () {
                //When the mouse leaves the object, reset the colors to their old values.
                $(this).css({"background":"#333","color":"#CCC"});
            });
            //When you click an element with the class "infoblock"
            $(".infoblock").click(function() {
                //Slowly hide the element
                $(this).hide("slow");
            });
            //When you click the blue block
            $("#blueblock").click(function() {
                $("#header").css({"border":"2px solid white"});
            });
            
            $("#blueblock").css({"background":"#336"});
            
            $("#innercontent").prepend('<div class="infoblock">This box was added entirely by Javascript. Note how it does not highlight, due to the hover function being called before it was created. View the jQuery documentation <a href="http://docs.jquery.com/">here</a>.</div>');
        });
    </script>
</head>

<!-- The body contains the content that your user will see --> 
<body>
    <!-- 'div' tags contain their content in a rectangular block --> 
    <!-- They are great for arranging your content --> 
    <div id="content">
        <!-- This runs the 'nav.php' file, which contains the HTML code for the navigation bar --> 
        <?php include 'nav.php'; ?>
        <!-- ID tags uniquely define elements for CSS Styling and Javascript (JS) access --> 
        <!-- No two id tags can be the same --> 
        <div id="innercontent">
            <!-- class tags define a type of element and need not be unique, for CSS Styling and Javascript (JS) access -->
            <!-- You can have multiple elements with the same class -->
            <div class="infoblock">
                Try hovering over this block, then try clicking me!
            </div>
            <div class="infoblock" id="blueblock">
                This block will be styled in blue by the javascript above
            </div>
            <!-- See this file for an example database query -->
            <?php include 'examplequery.php'; ?>
        </div>
        <!-- This includes the footer at the bottom of each page -->
        <?php include 'footer.php'; ?>
    <!-- Always close your tags -->
    </div>
</body>
</html>
