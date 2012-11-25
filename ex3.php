<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Always specify a DOCTYPE and an XML Specification --> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CPSC 471 Course Project</title>
    <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".baby").hover(function(){
                $(this).css({"background":"#000","color":"white"});
            }, function() {
                $(this).css({"background":"#008","color":"white"});
            })
        });
    </script>
    <!-- The 'style' tag defines an inline CSS stylesheet to format the items on the page -->
    <style>
        /* Select the element with the id of "centerme" */
        #centerme {
            /* the element will be 200px wide, have a 0px margin on the top and bottom, and margins of equal maximum value on the left and right (causing the centering), and a background color of light red */
            width: 200px;
            margin: 0px auto;
            background: #FCC;
        }
        /* Select the element with the id of "daddy" */
        #daddy {
            /* This element will be positioned relative to its parent object, this type of positioning is usually better to avoid */
            position: absolute;
            /* Position it flush to the side of the window, and 50 pixels from the bottom of the window */
            right: 0px;
            bottom: 50px;
            width: 300px;
            /* in addition to hexadecimal colors, some colors can be specified by their english name */
            background: cyan;
        }
        /* Select all elements with the class "baby" */
        .baby {
            /* margins are outside of the element */
            margin: 10px;
            /* borders are between the margin and the padding */
            border: 1px solid white;
            /* padding is between the child elements and the border */
            padding: 50px;
            /* you can also specify font size, and many other font properties with CSS */
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div id="centerme">
        This div tag should be centered. Hit a baby to go back to the homepage.
    </div>
    <a href="./">
        <div id="daddy">
            <div class="baby">
                Baby 1
            </div>
            <div class="baby">
                Baby 2
            </div>
            <div class="baby">
                Baby 3
            </div>
        </div>
    </a>
</body>
</html>
