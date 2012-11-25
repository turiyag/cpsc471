<?php
    include('sqli.php');
    
    $query = "SELECT DISTINCT `semester` FROM courses";
    $result = $mysqli->query($query);
    if ($row = $result->fetch_assoc()) {
        $semesteroptions = '<option selected value="' . $row['semester'] . '">' . substr($row['semester'], 0, -4) . ' ' . substr($row['semester'],-4) . '</option>';
        $semester = $row['semester'];
    } else {
        die("Error: No courses present");
    }
    while ($row = $result->fetch_assoc()) {
        $semesteroptions .= '<option value="' . $row['semester'] . '">' . substr($row['semester'], 0, -4) . ' ' . substr($row['semester'],-4) . '</option>';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('header.php'); ?>
    </head>
    <body>
        <div data-role="page" data-theme="a">
            <script>
                $(function() {
                    $('#txtCourse').keyup(function(event) {
                        event.preventDefault();
                        $("#errorbox").html("Keyedup!").show().fadeOut(3500);
                        if($('#txtCourse').val() != "") {
                            $("#errorbox").html("Good val!").show().fadeOut(3500);
                            $.get('subjectlist.php', {'semester':$('#lstSemester').val(), 'name':$('#txtCourse').val()}, function(data) {
                                
                                $("#errorbox").html("Got data!\n" + JSON.stringify(data)).show().fadeOut(3500);
                                courses = data;
                                $("#results").empty();
                                $("#popups").empty();
                                $.each(courses,function(name, desc) {
                                    datacourse = name.replace(/[^a-zA-Z0-9]+/g,'');
                                    $("#popups").append('<div data-role="popup" id="pop' + datacourse + '"> <p>' + desc + '</p></div>').trigger("create");
                                    $("#results").append('<a href="#pop' + datacourse + '" data-role="button" data-inline="true" data-rel="popup">' + name + '</a>').trigger("create");
                                });
                            },"json");
                        } else {
                            $("#errorbox").html("Bad val!");
                            $("#results").empty();
                            $("#popups").empty();
                        }
                    });
                });
            </script>
            
            <div data-role="header">
                <h1>DNDN</h1>
            </div>
            <div data-role="content">
                <label for="lstSemester">Semester:</label>
                <select name="lstSemester" id="lstSemester">
                    <?php
                        print($semesteroptions);
                    ?>
                </select>
                <label for="txtCourse">Course name:</label>
                <input type="search" id="txtCourse" name="txtCourse" placeholder="ex. CPSC471" data-theme="a" />
                <div id="results">
                </div>
                <div id="errorbox">
                </div>
            </div>
            <?php include('footer.php'); ?>
            <div id="popups">
            </div>
        </div>
    </body>
</html>