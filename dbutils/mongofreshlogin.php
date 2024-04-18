<?php
require_once('mongodbutils.php');
require_once('user.php');

session_start();

//check if user is already logged in
if (isset($_SESSION['username'])) {
    //redirect to user's homepage if they are already signed in
    echo "redirect to correct page post login";
    //TODO
    //header("Location: " . $_SESSION['user_home_page']);
    exit;
}

//check if here from POST request with first time login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_POST);
    if (isset($_POST['register'])) {
        //attempt to register new user
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        //check if username is already registered
        //TODO: validate username
        //TODO: validate password
        if (userExists($username)) {
            $error = "username is already in use";
        }
        //TODO: email check
        else {
            //place new user in the login db
            //TODO: add email
            storeNewUser($username, $email, $password);
            //assign session variables for post login
            $_SESSION['username']  = $username;
            $_SESSION['email'] = $email;
            $_SESSION['user'] = new User($username, $email);
            //regenerate session id to reduce fixation attacks
            session_regenerate_id(true);
            //redirect to desired page after login
            //TODO
            echo "redirect to correct page post registration";
            //header("Location: " . $_SESSION['user_home_page']);
            exit;
        }
        }
    }
    //repeat time login
    if (isset($_POST['login'])) {
        $password = $_POST['password'];
        $email = $_POST['email'];

        //check if username is already registered
        if (emailExists($email)) {
            $username = getUsername($email);
            //true when password matches stored password for given username
                if(verifyPassword($username, $password)) {
                    //assign session variables for post login
                    $_SESSION['username']  = $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['user'] = new User($username, $email);
                    //regenerate session id to reduce fixation attacks
                    session_regenerate_id(true);
                    //redirect to desired page after login
                    //TODO
                    echo "redirect to correct page post login";
                    //header("Location: " . $_SESSION['user_home_page']);
                    exit;
                }
                else {
                    //TODO handle password not matching
                    $error = "password does not match";
                }
            }
            else {
                //TODO handle email not here
                $error =  "email not found";
            }
    }


?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration and Login</title>
</head>
<body>
    <h1>User Registration and Login</h1>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit" name="register">Register</button>
        <button type="submit" name="login">Login</button>
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>