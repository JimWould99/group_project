<?php
	require_once('../../dbutils/mongodbutils.php');
	require_once('../../utils/utils.php');
	use MongoDB\BSON\ObjectId;
	session_start();
	$username = "TESTINGresearch"; # currently a default username as did not want to mess with login

	$_id = new ObjectId($_POST["_id"]);
	$research = deleteResearchPage($_id);

	header("Location: ../../pages/browseresearch.php"); # TO DO indicate in some way that it was successful.

?>