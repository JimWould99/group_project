<?php
	require_once('../../dbutils/mongodbutils.php');
	require_once('../../utils/utils.php');
	use MongoDB\BSON\ObjectId;
	session_start();

	$_id = getId();


	deleteResearchPage($_id);
	header("Location: ../../pages/overview.php"); # TO DO indicate in some way that it was successful.

?>