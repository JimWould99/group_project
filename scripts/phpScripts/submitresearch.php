<?php
	require_once('../../dbutils/mongodbutils.php'); // import mongodb utils to interact with db
	require_once('../../utils/utils.php'); // import get id function
	session_start();
	$username = $_SESSION["username"];

	$_id = getId(); // gets id from the page
	if (!getId()){// if there was no id
		$_id = createResearchPage($username)->getInsertedId(); //makes a new page and gets its id
	}
	
	storeResearchImage($_FILES['Thumbnail'], getResearchPage($_id), 1);

	updateResearchPage($_id, $_POST); // fills in values submitted to this script into the new/existing research page
	setResearchPageVerification($_id,false);// sets the page to unverified so that it needs to be verified by a tto

	#TO DO indicate in some way that it was successful.
	header("Location: ../../pages/overview.php");
?>