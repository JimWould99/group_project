<?php

//redirect to given url and stop current php
//to go to homepage use redirect('');
function redirect($url)
{
    //TODO: add base header for the website to append to
    //e.g.
    header('Location: http://localhost/' . $url);
    exit();
}

function redirectLandingPage() {
    redirect('landingpage.html');
}



?>