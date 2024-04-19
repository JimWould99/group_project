<?php
require_once('../dbutils/mongodbutils.php');
require_once('../utils/utils.php');
session_start();

//use the tile thing tom used to look at a list of research, we can do this page later
include '../scripts/phpScripts/header.php';


foreach (getAllReasearchPages() as $document) { # prints all of the research pages as titles, will
    # need cleaning up to be tiled based and include blurb and image
    $pageid = $document["_id"];
    $pagetitle = $document["Title"];
    echo "<a href=researchpage.php?_id=".$pageid.">".$pagetitle."</a>";
    echo "<br>";

}
?>
<link rel="stylesheet" href="../styles/browseprofiles.css" />