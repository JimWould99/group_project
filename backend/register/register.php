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
    //TODO: remove echo
    //echo "redirect to correct page post login";
    //TODO
    redirectLandingPage();
    exit;  
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //TODO: remove debugging echo
    print_r($_POST);
    if (isset($_POST['login_button'])) {
        //registration attempt has been made, check db for matches
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $accountType = $_POST['account_type'];
        $error = [];

        if (userExists($username)) {
            $error['username'] = "username is already in use";
        }
        if (emailExists($email)) {
            $error['email'] = "email is already in use";
        }
        
        //if no errors, continue
        if (empty($error)) {
            //place new user in the db
            //TODO: check no other things need to be done
            createNewUser($username, $email, $accountType, $password);
            //assign session variables for post login
            $_SESSION['username']  = $username;
            $_SESSION['email'] = $email;
            $_SESSION['accountType'] = $accountType;
            $userDocument = getUserData($username);
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
    <div id="sign_up_box">
        <h1>BrookesConnect</h1>
        <form action="#" id="login_form">
            <div class="second_form_section">
                <div class="form_sub_section" id="first_sub">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                    <span id="span_username">Invalid username</span>
                </div>
                <div class="form_sub_section" id="second_sub">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email">
                    <span id="span_email">Invalid email</span>
                </div>
            </div>
            <div class="second_form_section">
                <div class="form_sub_section" id="third_sub">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <span id="span_password">Invalid password</span>
                </div>
                <div class="form_sub_section" id="fourth_sub">
                    <label for="confirm">Confirm password</label>
                    <input type="password" name="confirm" id="confirm">
                    <span id="span_confirmation">Invalid confirmation</span>
                </div>
            </div>
            <div id="extra_section">
                <span id="radio_match" >
                    Passwords must match
                </span>
            </div>
            <div id="select">
                <div id="select_body">
                    <label for="asm">Academic staff
                    <input type="radio" name="account_type" id="asm" value="asm">
                    <span class="checked"></span>
                    </label>
                    <label for="ir">Industry Representative
                    <input type="radio" name="account_type" id="ir" value="ir">
                    <span class="checked"></span>
                </div>
            </div>
            <button type="submit" name="login_button" id="login_button">Register</button>
            <hr>
            <div id="lower_section">
                <a href="">Log in</a>
                <a href="">Browse mode</a>
            </div>
        </form>
    </div>
    <script src="verification.js"></script>
</body>
</html>