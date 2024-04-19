<?php

$cwd = 'http://localhost/real_group_project/';
//redirect to given url and stop current php
//to go to homepage use redirect('');
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