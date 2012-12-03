<?php
    session_start();
    session_destroy();
    session_start();
    include('../sqli.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div id="signup" data-role="page" data-theme="e">
            <script>
                $(document).delegate("#login", "pageinit", function() {
                });
            </script>
            <?php include('../header.php');?>
            <div data-role="content">
                <?php
                    if (isset($_SESSION['signuperror'])) {
                ?>
                        <ul style="margin:15px;" data-role="listview" data-theme="c">
                            <li>
                                <strong>Error: </strong> <?php echo $_SESSION['signuperror']; ?>
                            </li>
                        </ul>
                <?php
                    }
                ?>
                <form method="post" action="sqlsignup" data-ajax="false">
                    <label for="txtUsername">Username:</label>
                    <input type="text" id="txtUsername" name="username" placeholder="username" />
                    <label for="txtEmail">E-mail:</label>
                    <input type="email" id="txtEmail" name="email" placeholder="email" />
                    <label for="txtTel">Telephone:</label>
                    <input type="tel" id="txtTel" name="tel" placeholder="telephone #" />
                    <label for="txtPassword">Password:</label>
                    <input type="password" id="txtPassword" name="password" placeholder="password" />
                    <button>Sign up</button>
                </form>
            </div>
            <?php include('../footer.php'); ?>
        </div>
    </body>
</html>