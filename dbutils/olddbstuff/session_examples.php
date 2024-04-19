<?php

//sets a session with a lifetime of 30 minutes
session_start(['cookie_lifetime' => 1800]);

//set a variable in the superglobal $_SESSION
$_SESSION['username'] = "testuser1";

//retrieve variable from the superglobal
$username = $_SESSION['username'];

//delete the variable from the session
unset($_SESSION['username']);

//regenerates the session id - use after authorising a session to prevent a fixation attack
session_regenerate_id(true);

//updates the session cookie with the given lifetime e.g. 1 hour
setcookie(session_name(),session_id(),time()+3600);

//destroy the session and all associated data
session_destroy();

//if user_id is not set then redirect to index.php
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

//how to deal with logout
session_start();
session_destroy();
header("Location: index.php");
exit;

?>