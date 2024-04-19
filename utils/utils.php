<?php

function getROOT() {
    return 'http://localhost/real_group_project/';
}
//redirect to given url and stop current php
//to go to homepage use redirect('');
function redirect($url)
{
    //TODO: add base header for the website to append to
    //e.g.
    header('Location: ' . getROOT() . $url);
    exit();
}

function pathRoot() {
    echo getROOT();
}

function genLink($URI) {
    echo getROOT() . $URI;
}

function redirectLandingPage() {
    redirect('pages/landingpage.php');
}

function redirectProfilePage() {
    redirect('pages/profilepage.php');
}

?>