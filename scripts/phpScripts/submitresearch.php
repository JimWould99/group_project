<?php
	require_once('../../dbutils/mongodbutils.php');
	require_once('../../utils/utils.php');
	use MongoDB\BSON\ObjectId;
	session_start();
	$username = "TESTINGresearch"; # currently a default username as did not want to mess with login


	if (isset($_GET["_id"])){ // check if editing a page or making a new one
		$pageid = $_GET["_id"];
		$_id = new ObjectId($pageid); // 
	} else{
		$_id = createResearchPage($username)->getInsertedId(); //makes a new page and gets its id
	}
	updateResearchPage($_id, $_POST); // fills in values submitted to this script into the new/existing research page


	#TO DO indicate in some way that it was successful.
	header("Location: ../../pages/browseresearch.php");
?>