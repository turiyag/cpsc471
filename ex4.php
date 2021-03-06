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
                <?php
                    //PHP variables must begin with the $ symbol
                    $var1 = "Hello";
                    //String concatenation is done with the . symbol
                    $var2 = $var1 . " Wo";
                    //You can use the .= operator as shorthand to concatenate a string with itself and something
                    $var2 .= "rld!";
                    //Anything in double quotes is interpreted
                    echo "<p>$var2</p>";
                    //Things in single quotes are "as is"
                    echo '<p>$var2</p>';
                    
                    echo "<table>";
                    echo "<tr><th>Numbers</th></tr>";
                    for ($i = 0; $i < 10; $i++) {
                        echo "<tr><td>$i</td></tr>";
                    }
                    echo "</table>";
                ?>
            </div>
        </div>
        <!-- This includes the footer at the bottom of each page -->
        <?php include 'footer.php'; ?>
    <!-- Always close your tags -->
    </div>
</body>
</html>