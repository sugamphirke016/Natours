<?php
// This is the logout script
    session_start();
    $_SESSION = array();
    session_destroy();
    header("location: index.php");
?>