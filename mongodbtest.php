<?php

session_start();
require_once('db.php');
require_once('mongodbutils.php');
require_once('user.php');

$db = getDB();

    //attempt to register new user
    $username = "testuser2";
    $password = "testuser2";
    $email = "testuser2@email.com";
    $error = '';


?>