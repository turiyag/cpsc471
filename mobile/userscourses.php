
<?php
    include("./login/enforcelogin.php");
    include('sqli.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div id="userscourses" data-role="page" data-theme="a">
            <script>
                var getReq;
                $(document).delegate("#userscourses", "pageinit", function() {
                    $('#txtCourse').keyup(doSearch);
                    $('.ui-content').on('click', '.ui-input-clear', function(e){
                        $("#results ul").empty();
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
                            $("#results ul").empty();
                            $.each(courses,function(name, desc) {
                                buttonid = 'pop' + name.replace(/[^a-zA-Z0-9]+/g,'');
                                $("#results ul").append('<li id="' + buttonid + '"><a href="mycourse?course=' + name + '"><h3>' + name + '</h3><p>' + desc + '</p></a></li>');
                            });
                            $("#results ul").listview('refresh');
                        },"json");
                    } else {
                        $("#results ul").empty();
                    }
                }
            </script>
            <?php include('header.php');?>
            <div data-role="content">
                <?php
                    if (isset($_SESSION['userscoursesmsg'])) {
                ?>
                        <ul style="margin:20px 0px;" data-role="listview" data-theme="d">
                            <li>
                                <?php echo $_SESSION['userscoursesmsg']; ?>
                            </li>
                        </ul>
                <?php
                    }
                ?>
                <ul style="margin:20px 0px;" data-role="listview">
                    <li data-role="list-divider">My Course Ratings</li>
                    <?php
                        $query = "SELECT u.course,u.stars,c.minidesc FROM userscourses AS u, coursereqs AS c";
                        $query .= " WHERE u.user='" . $_SESSION['username'] . "' AND c.course=u.course";
                        $result = $mysqli->query($query);
                        if($row = $result->fetch_assoc()) {
                            do {
                                echo '<li><a href="mycourse?course=' . $row['course'] . '"><h3>' . $row['course'] . '</h3><p>' . $row['minidesc'] . '</p><div style="float:right; margin-top:-44px;"><img src="img/' . $row['stars'] . 'star18.png" /></div></a></li>';
                            } while ($row = $result->fetch_assoc());
                        } else {
                            echo '<li>No courses rated yet. Rate courses below.</li>';
                        }
                    ?>
                </ul>
                <hr />
                <ul style="margin:20px 0px;" data-role="listview">
                    <li data-role="list-divider">Rate Courses</li>
                </ul>
                <label for="txtCourse">Course name:</label>
                <input type="search" id="txtCourse" name="txtCourse" placeholder="ex. CPSC471" data-theme="a" />
                <div id="results">
                    <ul style="margin:20px 0px;" data-role="listview">
                    </ul>
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