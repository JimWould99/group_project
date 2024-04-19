<?php

session_start();
//require_once('db.php');
require_once('mongodbutils.php');
//require_once('user.php');

foreach (getAllUserData() as $document) {
    print_r($document);
    echo "\n\n";
}


?>