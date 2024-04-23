<?php
	require_once('../../dbutils/mongodbutils.php');
	require_once('../../utils/utils.php'); // FIX UTILS you need to change the ../../ to be a proper directory
	
	use MongoDB\BSON\ObjectId;
	session_start();
	$_id = getId();
	$rejectMessage = "";
	setRejectMessage($_id, $rejectMessage); //clears the rejection message
	setResearchPageVerification($_id,true);
	header("Location: ../../pages/approve.php"); # TO DO indicate in some way that it was successful.
	
?>