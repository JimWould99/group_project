<?php
//ensure we are in session
session_start();
//import needed dbutils
require_once('dbutils/mongodbutils.php');
require_once('utils/utils.php');

//check if user is already logged in
//TODO: maybe change this as should have to log out before accessing this page again?...
if (isset($_SESSION['username'])) {
    //redirect to user's homepage if they are already signed in
    //echo "redirect to correct page post login";
    //TODO
    redirectLandingPage();
    exit;  
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //TODO: remove debugging echo
    //print_r($_POST);
    if (isset($_POST['login_button'])) {
        //login attempt has been made, check db for matches
        $username_or_email = $_POST['username'];
        $password = $_POST['password'];
        $error = [];

        //check whether given 'username' var is the username or email for the user
        if (str_contains($username_or_email, '@')) {
            $email = $username_or_email;
            $username = getUsername($email);
        } else {
            $username = $username_or_email;
            $email = getEmail($username);
        }

        if (!userExists($username)) {
            $error["username"] = "username not found";
        }
        if (!emailExists($email)) {
            $error["email"] = "email not found";
        }
        if (!verifyPassword($username, $password)) {
            $error["password"] = "password does not match";
        }

        //check no errors found
        if (empty($error)) {
            //login attempt is valid:
            $userDocument = getUserData($username);
            //assign session variables for post login
            $_SESSION['userData'] = $userDocument;
            $_SESSION['username']  = $username;
            $_SESSION['email'] = $email;
            $_SESSION['accountType'] = $userDocument['AccountType'];
            //regenerate session id to reduce fixation attacks
            session_regenerate_id(true);
            //redirect to desired page after login
            //TODO meant to be home page i believe
            //echo "redirect to correct page post registration";
            redirectLandingPage();
            exit;
        } else {
            //TODO: better error handling
            //print_r($error);
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body id="register">
    <div id="login_box">
        <h1>BrookesConnect</h1>
        <form action="" id="login_form">
            <div class="form_section" id="username_section">
                <label for="username">Username / Email</label>
                <input type="text" name="username" id="username">
                <span id="span_username">Invalid username</span>
            </div>
            <div class="form_section" id="password_section">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <span id="span_password">Invalid password</span>
            </div>
            <button type="submit" name="login_button" id="login_button">Login</button>
            <hr>
            <div id="lower_section">
                <a href="">Register</a>
                <a href="">Browse mode</a>
            </div>
        </form>
    </div>
    <script src="login.js"></script>
</body>
</html>