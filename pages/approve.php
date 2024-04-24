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

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Document</title>
		<link rel="stylesheet" href="../styles/styles.css" />
	</head>
	<body id="approve_page">
		<div id="height">
		<?php genHeader($profileId,$accounttype);?>
		<!-- KEEPING THE BELOW CURRENTLY FOR JACK TO DO CSS CHANGES SO HE CAN SEE WHAT HE WROTE ORIGINALLY-->
			<!--
			<div class="approve_bar">
				<div id="research_card" onclick="location.href='#'">
					<p id="title">Example title one</p>
					<div id="image"></div>
					<p id="short_bio">
						Short Bio: Neque convallis a cras semper auctor neque. Tempus
						imperdiet nulla malesuada pellentesque elit eget. Tempus imperdiet
						nulla malesuada pellentesque elit eget.
					</p>
					<p id="author">David Lightfoot</p>
				</div>
				<div id="button_box">
					<button id="approve_button">Approve</button>
					<button id="reject">Reject</button>
				</div>
				<dialog open>
					<form action="">
						<label for="feedback">Rejection feedback</label>
						<input type="text" name="feedback" id="feedback" />
						<button id="submit" type="submit">Submit</button>
					</form>
				</dialog>
			</div>
			-->
			<?php generateApproveCard(); #runs the script that generates cards?>
			
		</div>
		<?php genFooter();?>
		<script src="../scripts/approve.js"></script>
	</body>
</html>
