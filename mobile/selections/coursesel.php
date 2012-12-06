<?php
    session_start();
    if (isset($_GET['semester'])) {
        $_SESSION['semester'] = $_GET['semester'];
    }
    include('../sqli.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div id="coursesel" data-role="page" data-theme="a">
            <script>
                var getReq;
                $(document).delegate("#coursesel", "pageinit", function() {
                    $('#txtCourse').keyup(doSearch);
                    $('.ui-content').on('click', '.ui-input-clear', function(e){
                        $("#coursesellist").empty();
                    });
                });
                
                //Does a search
                function doSearch(event) {
                    event.preventDefault();
                    if($('#txtCourse').val() != "") {
                        if (getReq) {
                            getReq.abort();
                            
                        }
                        getReq = $.get('subjectlist', {'name':$('#txtCourse').val()}, function(courses) {
                            $("#coursesellist").empty();
                            $.each(courses,function(name, desc) {
                                $("#coursesellist").append('<li><a href="periodsel?course=' + name + '"><h3>' + name + '</h3><p>' + desc + '</p></a></li>');
                            });
                            $("#coursesellist").listview('refresh');
                        },"json");
                    } else {
                        $("#coursesellist").empty();
                    }
                }
            </script>
            <?php include('../header.php');?>
            <?php if (isset($_SESSION['enrolmentmessage'])) { ?>
                    <div data-role="header" data-theme="e">
                        <h1>Message</h1>
                    </div>
                    <div data-role="content">
                        <ul style="margin:20px 0px;" data-role="listview" data-theme="d">
                            <li>
                                <?php echo $_SESSION['enrolmentmessage']; ?>
                            </li>
                        </ul>
                    </div>
            <?php
                    unset($_SESSION['enrolmentmessage']); 
                }
            ?>
            <div data-role="content">
                <a href="semestersel" data-role="button" data-icon="arrow-l">Select another semester</a>
            </div>
            <div data-role="header" data-theme="e">
                <h1>Select a course</h1>
            </div>
            <div data-role="header" data-theme="e">
                <h1>
                    <?php
                        echo($_SESSION['semester']);
                    ?>
                </h1>
            </div>

            <div data-role="content">
                <label for="txtCourse">Course name:</label>
                <input type="search" id="txtCourse" name="txtCourse" placeholder="ex. CPSC471" data-theme="a" />
                <ul id="coursesellist" style="margin:20px 0px;" data-role="listview">
                    <li data-theme="e">No courses selected. Search for a course above.</li>
                </ul>
            </div>
            <?php include('../footer.php'); ?>
        </div>
    </body>
</html>