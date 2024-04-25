<?php
	require_once('../../dbutils/mongodbutils.php'); // import mongodb utils to interact with db
	require_once('../../utils/utils.php'); // import get id function
	session_start();

	deleteResearchPage(getId());// deletes the research page with the given id
	header("Location: ../../pages/overview.php"); //return to overview
?>