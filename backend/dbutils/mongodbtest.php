<?php

session_start();
//require_once('db.php');
require_once('mongodbutils.php');
//require_once('user.php');

$document = '';
$username = 'testuser101';
$email = 'test101@email.com';
$password = 'passwordtest101';
if (!userExists($username)) {
    echo 'creating new user';
    createNewUser($username, $email, $password);
} else {echo ' not creating new user';}

print_r(getUserData($username));

?>