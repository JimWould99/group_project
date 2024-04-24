<?php
	require_once('../templates/headertemplate.php'); // requires the header template to be loaded
	require_once('../templates/footertemplate.php'); // requires the footer template to be loaded
  require_once('../templates/overviewtemplate.php');  // requires the overviewcards template to be loaded
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

	if (isset($_SESSION["username"])){ // if user is logged in
		$accounttype = getUserData($_SESSION["username"])["AccountType"]; // find the user's account type
		if ($accounttype != "asm"){ // if the user isn't an asm send them to landing page as they cannot own/edit research pages
			redirectHome();
		}
	} else{ // if not logged in send to landing page
		redirectHome();
	}
	$profileId = getProfileId($_SESSION["username"]);// gets the user's profile id from their username
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Research Overview</title>
    <link rel="stylesheet" href="../styles/styles.css" />
  </head>
  <body id="overview_page">
    <div id="wrapper">
    <?php genHeader($profileId,$accounttype);?>
      <div id="overview_content">
        <h1>My research</h1>
        <div id="overview_buttons">
          <button onclick="deletion()">Delete Research</button>
          <button onclick="location.href = 'editresearchpage.php'">
            Add Research
            <span>+</span>
          <button onclick="edit()">Edit Research</button>
        </div>
      </div>
      <div id="overview">
		<?php generateOverviewCard($_SESSION["username"]) #runs the script that generates cards?>

        <!-- <div id="research_card" onclick="location.href='#'">
          <p id="title">Example title one</p>
          <div id="image"></div>
          <p id="short_bio">
            Short Bio: Neque convallis a cras semper auctor neque. Tempus
            imperdiet nulla malesuada pellentesque elit eget. Tempus imperdiet
            nulla malesuada pellentesque elit eget.
          </p>
          <p id="author">David Lightfoot</p>
        </div> -->


      </div>
      
    </div>
    <?php genFooter();?>
    <script src="../scripts/overview.js"></script>
  </body>
</html>
