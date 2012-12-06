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
        <div id="login" data-role="page" data-theme="a">
            <script>
                $(document).delegate("#login", "pageinit", function() {
                    <?php echo isset($_SESSION['loginerror']) ? "$(':password').focus();" : "$(':text').focus();"; ?>
                
                }
            </script>
            <?php include('../header.php');?>
            <div data-role="content">
                <?php
                    if (isset($_SESSION['loginerror'])) {
                ?>
                        <ul style="margin:15px;" data-role="listview" data-theme="c">
                            <li>
                                <strong>Error: </strong> <?php echo $_SESSION['loginerror']; ?>
                            </li>
                        </ul>
                <?php
                    }
                ?>
                <?php
                    if(!isset($_SESSION['loggedin'])) {
                ?>
                        <form method="post" action="enforcelogin" data-ajax="false">
                            <label for="txtUsername">Username:</label>
                            <input type="text" id="txtUsername" name="username" placeholder="username" data-theme="a" />
                            <label for="txtPassword">Password:</label>
                            <input type="password" id="txtPassword" name="password" placeholder="password" data-theme="a" />
                            <button>Login</button>
                        </form>
                        <br />
                        <br />
                        <hr />
                        <br />
                        <br />
                        <p>Not a member?</p>
                        <a data-role="button" href="signup" data-theme="d" data-ajax="false">Sign up</a>
                <?php
                    } else {
                ?>
                        <form method="post" action="logout" data-ajax="false">
                            <p>You are logged in as <?php echo $_SESSION['username']; ?>.</p>
                            <button>Log out</button>
                        </form>
                <?php
                    }
                ?>
            </div>
            <?php include('../footer.php'); ?>
        </div>
    </body>
</html>