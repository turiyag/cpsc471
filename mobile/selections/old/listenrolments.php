<?php
    session_start();
    include('../sqli.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div id="semestersel" data-role="page" data-theme="a">
            <script>
                $(document).delegate("#semestersel", "pageinit", function() {
        
                });
            </script>
            <?php include('../header.php');?>
            <div data-role="header" data-theme="e">
                <h1>My enrolments</h1>
            </div>

            <div data-role="content">
                <ul data-role="listview" data-theme="e" data-dividertheme="e">
                    <?php
                        $query = "SELECT e.period, c.semester, c.`name` , p.`type` , p.`number` , p.room, p.instructor, t.`day` , t.`fromtime` , t.`totime` , t.`fromdate` , t.`todate`";
                        $query .= " FROM times AS t, enrolments AS e, periods AS p, courses AS c";
                        $query .= " WHERE e.period = p.`key`";
                        $query .= " AND c.`key` = p.course";
                        $query .= " AND e.period = t.period";
                        $query .= " AND e.username =  '" . $mysqli->real_escape_string($_SESSION['username']) . "'";
                        $query .= " ORDER BY p.`key` ASC";
                        $result = $mysqli->query($query);
                        $semesters = array();
                        $lastcourse = "";
                        $lastperiod = "";
                        $lastsemester = "";
                        if ($row = $result->fetch_assoc()) {
                            do {
                                if ($row['semester'] != $lastsemester) {
                                    $semesters[$row['semester']] = array();
                                    $lastsemester = $row['semester'];
                                }
                                if ($row['name'] != $lastcourse) {
                                    $semesters[$row['semester']][$row['name']] = array();
                                    $lastcourse = $row['name'];
                                }
                                if ($row['period'] != $lastperiod) {
                                    $semesters[$row['semester']][$row['name']][$row['period']] = array();
                                    $semesters[$row['semester']][$row['name']][$row['period']]['instructor'] = $row['instructor'];
                                    $semesters[$row['semester']][$row['name']][$row['period']]['room'] = $row['room'];
                                    $semesters[$row['semester']][$row['name']][$row['period']]['number'] = $row['number'];
                                    $semesters[$row['semester']][$row['name']][$row['period']]['type'] = $row['type'];
                                    $lastperiod = $row['period'];
                                }
                                $semesters[$row['semester']][$row['name']][$row['period']]['times'][] = array('day' => $row['day'], 'fromtime' => $row['fromtime'], 'totime' => $row['totime'], 'fromdate' => $row['fromdate'], 'todate' => $row['todate']);
                            } while($row = $result->fetch_assoc());
                        } else {
                            echo ("<li>You are not enrolled in any courses</li>");
                        }
                        foreach ($semesters as $semestername => $courses) {
                            echo('<li data-role="list-divider"><h3>' . $semestername . '</h3></li>');
                            foreach ($courses as $coursename => $coursedata) {
                                echo('<li data-role="list-divider">' . $coursename . '</li>');
                                foreach ($coursedata as $periodname => $perioddata) {
                                    echo('<li>');
                                    echo('<h3>' . $perioddata['instructor'] . '</h3>');
                                    echo('<p>' . $perioddata['type'] . " " . $perioddata['number'] . " - " . $perioddata['room'] . '</p>');
                                    echo('<p>');
                                    foreach ($perioddata['times'] as $timekey => $timedata) {
                                        //print_r($timedata);
                                        echo('<p>' . $timedata['day'] . " " . $timedata['fromtime'] . " " . $timedata['totime'] . '</p>');
                                    }
                                    echo('</p>');
                                    echo('</li>');
                                    
                                }
                            }
                        }
                    ?>
                </ul>
            </div>