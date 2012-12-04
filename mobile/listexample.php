
<?php include("./login/enforcelogin.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div data-role="page" data-theme="a">
            <?php include('header.php');?>
            <div data-role="content">
                <ul data-role="listview">
                    <li data-role="list-divider">
                        Period 01
                        <span class="ui-li-count">
                            2 classes per week
                        </span>
                    </li>
                    <li>
                        <a href="index.html">
                                <h3>Stephen Weber</h3>
                                <p><strong>You've been invited to a meeting at Filament Group in Boston, MA</strong></p>
                                <p>Hey Stephen, if you're available at 10am tomorrow, we've got a meeting with the jQuery team.</p>
                                <p class="ui-li-aside"><strong>6:24</strong>PM</p>
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            <h3>jQuery Team</h3>
                            <p><strong>Boston Conference Planning</strong></p>
                            <p>In preparation for the upcoming conference in Boston, we need to start gathering a list of sponsors and speakers.</p>
                            <p class="ui-li-aside"><strong>9:18</strong>AM</p>
                        </a>
                    </li>
                </ul>
            </div>
            <?php include('footer.php'); ?>
        </div>
    </body>
</html>