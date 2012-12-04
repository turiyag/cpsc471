<?php
    include('../sqli.php');
    
    processFile("final-fixlinks.xml");
    $mysqli->close();
    echo "Woo! All done!";
    
    function processFile($path) {
        global $mysqli;
        $content = file_get_contents($path);
        $xmldoc = simplexml_load_string($content);
        $i = 0;
        foreach ($xmldoc as $course) {
            unset($vals);
            $vals[] = "";
            $vals[] = $course->coursename;
            $vals[] = $course->code;
            $vals[] = $course->desc;
            $vals[] = $course->fulldesc;
            $vals[] = $course->prereqs;
            $vals[] = $course->coreqs;
            $vals[] = $course->antireq;
            $vals[] = $course->notes;
            $vals[] = $course->aka;
            $vals[] = $course->repeat;
            $vals[] = $course->nogpa;
            insertRow('coursereqs',array('course','subject','code','minidesc','desc','prereq','coreq','antireq','note','aka','repeat','nogpa'),$vals);
            /*
            echo("<p>" . $course->coursename . " " . $course->code . "</p>");
            echo("<ul>");
            echo("<li>" . $course->desc . "</li>");
            echo("<li>" . $course->fulldesc . "</li>");
            echo("<li>" . $course->prereqs . "</li>");
            echo("<li>" . $course->coreqs . "</li>");
            echo("<li>" . $course->antireq . "</li>");
            echo("<li>" . $course->notes . "</li>");
            echo("<li>" . $course->aka . "</li>");
            echo("<li>" . $course->repeat . "</li>");
            echo("<li>" . $course->nogpa . "</li>");
            echo("</ul>");
            */
        }
        $mysqli->query("UPDATE `coursereqs` SET `subject`=(SELECT `code` FROM `subjects` WHERE `name`=`subject`)");
        $mysqli->query("UPDATE `coursereqs` SET `course`=CONCAT(`subject`,`code`)");
    }
    
?>