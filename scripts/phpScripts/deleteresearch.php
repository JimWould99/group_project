<?php
	require_once('../../dbutils/mongodbutils.php');
	use MongoDB\BSON\ObjectId;
	session_start();

	$_id = new ObjectId($_POST["_id"]);

	deleteResearchPage($_id);
	header("Location: ../../pages/browseresearch.php"); # TO DO indicate in some way that it was successful.

?>