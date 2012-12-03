<?php
    include('../sqli.php');
    session_start();
    unset($_SESSION['loginerror']);
    if(!$_SESSION['loggedin']) {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $query = "SELECT * FROM users WHERE username='" . $mysqli->real_escape_string($_POST['username']) . "' AND password='" . sha1($mysqli->real_escape_string($_POST['password'])) . "'";
            $result = $mysqli->query($query);
            //If credentials are accurate
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = sha1($mysqli->real_escape_string($_POST['password']));
                $_SESSION['loggedin'] = true;
                if(isset($_SESSION['preloginaddr'])) {
                    header('Location: ' . $_SESSION['preloginaddr']);
                } else {
                    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/projects/cpsc471project/mobile/');
                }
            } else {
                loginError("Invalid username or password");
            }
            $result->free();
        } else {
            //Not logged in and no credentials passed in
            //Remember where they were trying to go
            $_SESSION['preloginaddr'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            //And redirect them to the login page
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/projects/cpsc471project/mobile/login/');
        }
        $mysqli->close();
    }
    function loginError($err) {
        $_SESSION['loginerror'] = $err;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/projects/cpsc471project/mobile/login/');
        exit();
    }
?>