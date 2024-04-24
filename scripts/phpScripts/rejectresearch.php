<?php
	require_once('../../dbutils/mongodbutils.php');
	require_once('../../utils/utils.php'); // FIX UTILS you need to change the ../../ to be a proper directory
	
	use MongoDB\BSON\ObjectId;
	session_start();
	$_id = getId();
	$rejectMessage = $_POST["feedback"];
	setRejectMessage($_id, $rejectMessage);
	setResearchPageVerification($_id,false);
	header("Location: ../../pages/approve.php"); # TO DO indicate in some way that it was successful.
	
?>