<?php
    include('../sqli.php');
    session_start();
    unset($_SESSION['signuperror']);
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['tel'])) {
        $query = "SELECT * FROM users WHERE username='" . $mysqli->real_escape_string($_POST['username']) . "'";
        $result = $mysqli->query($query);
        if ($result->num_rows > 0) {
            $result->free();
            $mysqli->close();
            signupError("Username already taken");
        } else {
            $result->free();
            $vals[] = $mysqli->real_escape_string($_POST['username']);
            $vals[] = $mysqli->real_escape_string($_POST['email']);
            $vals[] = $mysqli->real_escape_string($_POST['tel']);
            $vals[] = sha1($_POST['password']);
            insertRow("users", array("username","email","tel","password"), $vals);
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/projects/cpsc471project/mobile/login');
        }
    } else {
        signupError("Not all fields specified");
    }
    
    function signupError($err) {
        $_SESSION['signuperror'] = $err;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/projects/cpsc471project/mobile/login/signup');
        exit();
    }
?>