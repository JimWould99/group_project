<?php
	require_once('../../dbutils/mongodbutils.php'); // import mongodb utils to interact with db
	require_once('../../utils/utils.php'); // import get id function
	session_start();

	$_id = getId(); // gets id from the page
	$bio = ['Bio' => $_POST["Bio"]]; // gets the profile bio
	
	updateProfilePage($_id, $bio); // get the profile page with the id and updates it

	header("Location: ../../pages/editprofile.php?_id=".$_id);
?>