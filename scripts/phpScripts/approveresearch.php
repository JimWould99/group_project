<?php
	require_once('../../dbutils/mongodbutils.php'); // import mongodb utils to interact with db
	require_once('../../utils/utils.php'); // import get id function
	session_start();

	$_id = getId(); // gets id from the page
	setRejectMessage($_id); //clears the rejection message
	setResearchPageVerification($_id,true);// verify the page to show everywhere
	header("Location: ../../pages/approve.php"); # TO DO indicate in some way that it was successful.
	
?>