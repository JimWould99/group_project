<?php

$cwd = '';
//redirect to given url and stop current php
//to go to homepage use redirect('');

function redirectHome(){ #looks the function below but i'll keep it for now as I don't want to mess with it
    header("Location: landingpage.php"); # redirects user back to homepage
    exit(); # stops the page as it should only exist for each research page
}


function redirect($url)
{
    //TODO: add base header for the website to append to
    //e.g.
    header('Location: ' . $cwd . $url);
    exit();
}

function pathRoot() {
    echo $cwd;
}

function redirectLandingPage() {
    redirect('landingpage.php');
}

$_SESSION['ROOT'] = $cwd;

?>