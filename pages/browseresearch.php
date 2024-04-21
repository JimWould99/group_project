<?php

    require_once('../templates/headertemplate.php');
    require_once('../templates/footertemplate.php');
    require_once('../dbutils/mongodbutils.php');
    require_once('../utils/utils.php');
    //ensure we are in session
    session_start();


    //use the tile thing tom used to look at a list of research, we can do this page later
    genHeader();


    foreach (getAllReasearchPages() as $document) { # prints all of the research pages as titles, will
        # need cleaning up to be tiled based and include blurb and image
        if ($document["Verified"] == TRUE){ //CHANGE BACK TO == TRUE FOR CORRECT FUNCTIONALITY
            $pageid = $document["_id"];
            $pagetitle = $document["Title"];
            echo "<a href=researchpage.php?_id=".$pageid.">".$pagetitle."</a>";
            echo "<br>";
        }
        

    }
?>
<link rel="stylesheet" href="../styles/browseprofiles.css" />
<?php genFooter();?>