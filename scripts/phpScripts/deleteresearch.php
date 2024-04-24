<?php
	require_once('../../dbutils/mongodbutils.php'); // import mongodb utils to interact with db
	require_once('../../utils/utils.php'); // import get id function
	session_start();

	deleteResearchPage(getId());// delets the research page with the
	header("Location: ../../pages/overview.php"); # TO DO indicate in some way that it was successful.
?>