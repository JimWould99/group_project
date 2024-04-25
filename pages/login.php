<?php
    //ensure we are in session
    session_start();
    //import needed dbutils
    require_once('../dbutils/mongodbutils.php');
    require_once('../utils/utils.php');

   //check if user is already logged in
   if (isset($_SESSION['username'])) {
    //redirect to landing page as this page shouldn't be accessible if user already logged in
    redirectLandingPage();
    exit;  
}

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
            //check for collisions in db
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
                $_SESSION['profilePage'] = getProfilePage($userDocument['ProfilePage']);
                //regenerate session id to reduce fixation attacks
                session_regenerate_id(true);
                //redirect to desired page after login
                redirectLandingPage();
                exit;
            } else {

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
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body id="register">
    <div id="login_box">
        <h1>BrookesConnect</h1>
        <form method="post" id="login_form">
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
                <a href="sign_up.php">Register</a>
                <a href="landingpage.php">Browse mode</a>
            </div>
        </form>
    </div>
    <script src="../scripts/login.js"></script>
</body>
</html>