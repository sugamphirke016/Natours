<?php
// This php file retrieves the username of the currently signedIn user
    session_start();
    $username = $_SESSION["username"];
    echo $username;
?>
