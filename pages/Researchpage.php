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
	

	if (!getId()){ // if get id returns false, then you are on a faulty page, so it sends you to the landing page
		redirectHome();
	} else{ // if page works get the page id via GET method
		$_id = getId();
	}
	
	if (researchPageExists($_id) == TRUE){ // if the research page exits
		$research = getResearchPage($_id); // gets research associated with the id
	} else{
		redirectHome(); // redirect to landing page if not
	}
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Brookes Connect</title>
		<link rel="stylesheet" href="../styles/researchpage.css" />
	</head>
	<body>

	<?php genHeader($profileId,$accounttype);?>
		<div id="main">
			<div id="intro_text">
				<?php
					echo "<p>".$research["Title"]."</p>";
					echo "<p>".$research["Body"]."</p>";
				?>
			</div>
		</div>
		<div id="files">
			<?php
				$rows = $research['Files'];
				$rows = iterator_to_array($rows);//convert bson object to PHP array
				echo "<table>"; // start a table tag in the HTML
				foreach( $rows as $filename => $filelocation) {   //Creates a loop to loop through results
					echo "<tr><td>" . "<a href=$filelocation download>" . htmlspecialchars($filename) . "</a>";
				}		
			?>

		<?php genFooter();?>
	</body>
</html>
