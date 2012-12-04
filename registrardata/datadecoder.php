<?php
    if(isset($_GET['idx'])) {
        $idx = $_GET['idx'];
    } else {
        $idx = 1;
    }
    include('sqli.php');
	$content = file_get_contents("datanov30b.csv");
	$cary = explode("\n",$content);
	for ($i = ($idx - 1) * 100; $i < $idx * 100; $i++) {
		$rary = explode(",",$cary[$i]);
		insertRow("rc2",array("sid","course"),$rary);
	}
    print "$idx";
    $mysqli->close();
    /*
    function processFile($path, $semester) {
        $content = file_get_contents($path);
        $xmldoc = simplexml_load_string($content);
        foreach ($xmldoc as $course) {
            $coursekey = $semester . ":" . $course["subject"] . $course["number"];
            insertRow("courses", array('key','semester','subject','number','name','desc'),array($coursekey, $semester, $course["subject"], $course["number"], $course["subject"] + $course["number"], $course->description));
            foreach ($course->periodic as $period) {
                $periodtypecode = substr($period['type'],0,1);
                if ($period['type'] == "Lab") {
                    $periodtypecode = "B";
                }
                $periodkey = $coursekey . "-" . $periodtypecode . $period['name'];
                insertRow("periods", array('key','course','type','number','group','room','instructor'), array($periodkey, $coursekey, $period['type'], $period['name'], $period['group'], $period->room, $period->instructor));
                foreach ($period->time as $time) {
                    $dates = explode(" - ", str_replace("/","-",$time['date']));
                    if(!isset($dates[1])) {
                        $dates[1] = '';
                    }
                    $times = explode(" - ", $time['time']);
                    if(!isset($times[1])) {
                        $times[1] = '';
                    }
                    insertRow("times", array('period','day','fromtime','totime','fromdate','todate'), array($periodkey, $time['day'] , $times[0]  . ":00", $times[1]  . ":00", $dates[0] , $dates[1]));
                }
            }
        }
    }
    
    function decodeentities($str) {
        return html_entity_decode(preg_replace_callback("/(&#[0-9]+;)/", function($m) { return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES"); }, $str));
    }
	*/
?>