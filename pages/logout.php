<?php
    //ensure we are in session
    session_start();
    //import needed utils
    require_once('../utils/utils.php');

    //remove all assignments in the session variable
    session_unset();
    //remove all session data including from user's browser
    session_destroy();
    //regen id
    session_regenerate_id(true);

    redirectLandingPage();


?>