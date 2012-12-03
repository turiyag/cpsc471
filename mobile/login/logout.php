<?php
    session_start();
    session_destroy();
    session_start();
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/projects/cpsc471project/mobile/login');
?>