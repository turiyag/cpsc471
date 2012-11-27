<div>
<?php
    include('sqli.php');
    
    print "<p>";
    print '<pre>"SELECT * FROM courses" . where(array("semester","name"), "LIKE", $glue = "AND", $pre = "", $post = "%")</pre>';
    print "SELECT * FROM courses" . where(array("semester","name"), "LIKE", $glue = "AND", $pre = "", $post = "%");
    print "</p>";
    print "<hr />";

    print "<p>";
    print '<pre>"SELECT * FROM courses" . where(array("semester"), "LIKE", $glue = "AND", $pre = "", $post = "%")</pre>';
    print "SELECT * FROM courses" . where(array("semester"), "LIKE", $glue = "AND", $pre = "", $post = "%");
    print "</p>";
    print "<hr />";
    
    print "<p>";
    print '<pre>"SELECT * FROM courses" . where(array("semester","name"), "LIKE", $glue = "OR", $pre = "", $post = "%")</pre>';
    print "SELECT * FROM courses" . where(array("semester","name"), "LIKE", $glue = "OR", $pre = "", $post = "%");
    print "</p>";
    print "<hr />";
    
    print "<p>";
    print '<pre>"SELECT * FROM courses" . where(array("semester","name"), "=", $glue = "AND")</pre>';
    print "SELECT * FROM courses" . where(array("semester","name"), "=", $glue = "AND");
    print "</p>";
    print "<hr />";
    
    print "<p>";
    print '<pre>"SELECT * FROM periods" . where(array("type","room"), "=")</pre>';
    print "SELECT * FROM periods" . where(array("type","room"), "=");
    print "</p>";
    print "<hr />";
    
    print "<p>";
    print '<pre>"SELECT * FROM periods" . where("type")</pre>';
    print "SELECT * FROM periods" . where("type");
    print "</p>";
    print "<hr />";
?>
</div>
<div>
    <h3>Other examples</h3>
    <ul>
        <li>
            <a href="sqli-whereexamples.php?semester=Fall2012&name=CPSC">sqli-whereexamples.php?semester=Fall2012&name=CPSC</a>
        </li>
        <li>
            <a href="sqli-whereexamples.php?semester=Fall2012&name=CPSC471">sqli-whereexamples.php?semester=Fall2012&name=CPSC471</a>
        </li>
        <li>
            <a href="sqli-whereexamples.php?semester=Fall2012">sqli-whereexamples.php?semester=Fall2012</a>
        </li>
        <li>
            <a href="sqli-whereexamples.php">sqli-whereexamples.php</a>
        </li>
        <li>
            <a href="sqli-whereexamples.php?type=Lecture&room=EDE 422">sqli-whereexamples.php?type=Lecture&room=EDE 422</a>
        </li>
    </ul>
</div>