<?php
	require_once('../../dbutils/mongodbutils.php'); // import mongodb utils to interact with db
	require_once('../../utils/utils.php'); // import get id function
	session_start();
	$username = $_SESSION["username"];

	$_id = getId(); // gets id from the page
	if (!getId()){// if there was no id
		$_id = createResearchPage($username)->getInsertedId(); //makes a new page and gets its id
	}

	#TO DO indicate in some way that it was successful.
	header("Location: ../../pages/overview.php");
?>