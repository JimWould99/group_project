<?php
	require_once('../templates/headertemplate.php');
	require_once('../templates/footertemplate.php');
	require_once('../dbutils/mongodbutils.php');
	require_once('../utils/utils.php');
	//ensure we are in session
	session_start();
	if (isset($_SESSION["username"])){
		$accounttype = getUserData($_SESSION["username"])["AccountType"];
		if($accounttype == "asm"){
		  $profileId = getProfileId($_SESSION["username"]);
		} else{
		  $profileId = "";
		}
	  } else {
		$profileId = "";
		$accounttype = "";
	  }
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Search</title>
		<link rel="stylesheet" href="../styles/styles.css" />
	</head>
	<body id="search_page">
		<?php genHeader($profileId,$accounttype);?>
		<div id="search_results">
			<?php generateResearchCard() #runs the script that generates cards?>
		</div>
		<?php genFooter();?>
	</body>
</html>