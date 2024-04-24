<?php
	require_once('../../dbutils/mongodbutils.php');
	require_once('../../utils/utils.php');
	use MongoDB\BSON\ObjectId;
	session_start();
	// $username = "TESTINGresearch"; # currently a default username as did not want to mess with login

	$_id = getId();//
	$bio = ['Bio' => $_POST["Bio"]];
	
	updateProfilePage($_id, $bio);
	// get the profile page with the id and edit something



	// FOR YOUR BRAIN TOMORROW

	// you need to set the form action on edit profile to send the id of the profile page to this function/whatever, then using that wreite a function to update the bio and submit ti
	// make sure that george or whoever don't change anythging before you push or it will fuck everyuthing
	// also ask him wtf the tiles and things are about
	// YOU are a legend for doing so much lol
	#TO DO indicate in some way that it was successful.
	header("Location: ../../pages/editprofile.php?_id=".$_id);
?>