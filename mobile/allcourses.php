
<?php
    include('sqli.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div id="allcourses" data-role="page" data-theme="a">
            <script>
                var getReq;
                //When the page with the id "allcourses" (this page) finishes loading
                $(document).delegate("#allcourses", "pageinit", function() {
                    //When the element with the id txtCourse's keyup event fires (when someone lets go of a key), do a search (doSearch is defined below)
                    $('#txtCourse').keyup(doSearch);
                    //When the semester selection box changes, do a search (doSearch is defined below)
                    $('select').click(doSearch);
                    $('.ui-content').on('click', '.ui-input-clear', function(e){
                        $("#errorbox").html("Cleared search box with button!");
                        //Empty the div that has the buttons for each course (remove all elements)
                        $("#results").empty();
                        //Empty the div that contains the popups for each course button (remove all elements)
                        $("#popups").empty();
                    });
                });
                
                //Does a search
                function doSearch(event) {
                    //Don't let it submit the form
                    event.preventDefault();
                    if($('#txtCourse').val() != "") {
                        //$("#errorbox").html("Good val!").show().fadeOut(3500);
                        //If we previously made a request that hasn't been fulfilled yet
                        if (getReq) {
                            //Cancel that request
                            //That way our search results will contain the results as they were submitted in the correct order
                            //Preventing errors from fast typings and/or slow networks
                            getReq.abort();
                            
                        }
                        
                        //Make an ajax GET request for the contents of subjectlist.php, 
                        //    passing in the value of the <select> box as the 'semester' value
                        //    and the value of the course textbox as the 'name' value
                        getReq = $.get('subjectlist', {'semester':$('#lstSemester').val(), 'name':$('#txtCourse').val()}, function(courses) {
                            
                            //$("#errorbox").html("Got data!\n" + JSON.stringify(courses)).show().fadeOut(3500);
                            //Empty the div that has the buttons for each course (remove all elements)
                            $("#results").empty();
                            //Empty the div that contains the popups for each course button (remove all elements)
                            $("#popups").empty();
                            //For each value in the courses object
                            //Map the key to the variable 'name' and the value to the variable 'desc'
                            $.each(courses,function(name, desc) {
                                //The id of the popup shouldn't contain any weird characters like . or - or '
                                popupid = 'pop' + name.replace(/[^a-zA-Z0-9]+/g,'');
                                //Append to the popups div, the following HTML
                                //    Make a <div> element with the jQuery Mobile role of popup, and the id of popupid, containing
                                //        A paragraph (p) element that simply contains the description
                                //Once you have appended this, style the element with the trigger("create") method
                                $("#popups").append('<div data-role="popup" id="' + popupid + '"> <p>' + desc + '</p></div>').trigger("create");
                                //Append to the results div, the following HTML
                                //    Make an <a> element (a link) that links to the popup. 
                                //        The link should look like a button, be displayed inline (not take up the whole line), and should link to a popup
                                //        The text of the button should be the course name (ex. 'CPSC471')
                                //Once you have appended this, style the element with the trigger("create") method
                                $("#results").append('<a href="#' + popupid + '" data-role="button" data-inline="true" data-rel="popup">' + name + '</a>').trigger("create");
                            });
                        },"json");
                    //If the course textbox was empty, don't do a search
                    } else {
                        //$("#errorbox").html("Bad val!");
                        //Empty the div that has the buttons for each course (remove all elements)
                        $("#results").empty();
                        //Empty the div that contains the popups for each course button (remove all elements)
                        $("#popups").empty();
                    }
                }
            </script>
            <?php include('header.php');?>
            <div data-role="content">
                <label for="lstSemester">Semester:</label>
                <select name="lstSemester" id="lstSemester">
                    <?php
                        //Get the list of all available semesters
                        //And store it in the string 'semesteroptions'
                        $query = "SELECT DISTINCT `semester` FROM courses";
                        $result = $mysqli->query($query);
                        //For the first result, if it exists
                        if ($row = $result->fetch_assoc()) {
                            //Output the first semester as the selected one
                            print('<option selected value="' . $row['semester'] . '">' . substr($row['semester'], 0, -4) . ' ' . substr($row['semester'],-4) . '</option>');
                        } else {
                            //Die if there aren't any semesters
                            die("Error: No courses present");
                        }
                        //For other available semesters
                        while ($row = $result->fetch_assoc()) {
                            //Just append them as options to the <select> element (see below)
                            print('<option value="' . $row['semester'] . '">' . substr($row['semester'], 0, -4) . ' ' . substr($row['semester'],-4) . '</option>');
                        }
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