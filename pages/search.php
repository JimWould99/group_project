<?php
	require_once('../templates/headertemplate.php'); // requires the header template to be loaded
	require_once('../templates/footertemplate.php'); // requires the footer template to be loaded
	require_once('../dbutils/mongodbutils.php'); // requires that all functions that directly interact with the mongodb to be loaded
	require_once('../utils/utils.php'); // requires the non db interacting functions to be loaded in
	session_start(); //ensure we are in session
	
	if (isset($_SESSION["username"])){ // checks if the user is logged in
		$accounttype = getUserData($_SESSION["username"])["AccountType"]; // fetches the user's account type
		if($accounttype == "asm"){ // if logged in with an asm account
			$profileId = getProfileId($_SESSION["username"]); //fetches and sets the profile id associated with the logged in asm account
		} else{ // if not an asm sets profile id to blank string so that functions don't break but also do nothing
			$profileId = "";
		}
	} else { // if not logged in sets the profile id and account type to nothing to allow functions to work
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
			<div id="top_section">
				<div id="select_search">
						<label for="author_select">Author
						<input onclick="checkResults()" type="radio" name="account_type" class="second" id="author_select" value="author_select">
						<span class="checked"></span>
						</label>
						<label for="title_select">Title
						<input onclick="checkResults()" type="radio" name="account_type" class="second" id="title_select" value="title_select">
						<span class="checked"></span>
				</div>
				<div id="search_bar_section">
					<input
						type="text"
						id="search_bar"
						placeholder="Find research/ researchers"
						onkeyup="checkResults()"
					/>
				</div>
			</div>
		<div id="search_results">
			<?php generateResearchCard() #runs the script that generates cards?>
		</div>
		<?php genFooter();?>
		<script src="../scripts/search.js"></script>
	</body>
</html>
