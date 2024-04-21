<?php
	require_once('../../dbutils/mongodbutils.php');
	require_once('../../utils/utils.php'); // FIX UTILS you need to change the ../../ to be a proper directory
	
	use MongoDB\BSON\ObjectId;
	session_start();
	$_id = getId();

	echo $_GET["feedback"];// add this to the file
	rejectResearchPage($_id); // not strictly necessary but felt i should do this to be safe
	//header("Location: ../../pages/approve.php"); # TO DO indicate in some way that it was successful.
	
?>