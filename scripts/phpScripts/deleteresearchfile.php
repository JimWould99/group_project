<?php
	require_once('../../dbutils/mongodbutils.php'); // import mongodb utils to interact with db
	require_once('../../utils/utils.php'); // import get id function
	session_start();

	$_id = getId(); // gets id from the get
    $file = $_GET['file'];//get file from get

    echo $_id;
    echo $file;

    deleteResearchFile($file, getResearchPage(($_id)));

    updateResearchPage($_id, $_POST); // fills in values submitted to this script into the new/existing research page

    header("Location: ../../pages/overview.php"); # TO DO indicate in some way that it was successful.
    
	
?>