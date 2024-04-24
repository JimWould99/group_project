<?php
	require_once('../templates/headertemplate.php'); // requires the header template to be loaded
	require_once('../templates/footertemplate.php'); // requires the footer template to be loaded
	require_once('../dbutils/mongodbutils.php'); // requires that all functions that directly interact with the mongodb to be loaded
	require_once('../utils/utils.php'); // requires the non db interacting functions to be loaded in
	session_start(); //ensure we are in session

  $cursor = findRecentResearchPages(12); //get 9 most recent edited research pages
  //print_r($cursor);
  $_SESSION['researchPages'] = [];

  foreach ($cursor as $document) {
    array_push($_SESSION['researchPages'], $document);
  }

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
    <title>BrookesConnect Landing Page</title>
    <link rel="stylesheet" href="../styles/styles.css" />
  </head>
  <body id="landing_page">
  <?php genHeader($profileId,$accounttype);?>
    <div id="main_landing">
      <div id="background">
        <div id="intro_text">
          <p>Welcome <?php if(isset($_SESSION["username"])) // if user is logged in print user's username
          {echo $_SESSION["username"];}
          ?> to BrookesConnect</p>
          <p>
            Neque convallis a cras semper auctor neque. Tempus imperdiet nulla
            malesuada pellentesque elit eget. Eros in cursus turpis massa
            tincidunt. Sociis natoque penatibus et magnis dis parturient.
            Facilisis volutpat est velit egestas dui id ornare arcu. Nulla
            facilisi cras fermentum odio eu feugiat. Nec
          </p>
        </div>
      </div>

      <div class="trio" id="first">
        <h1>Cyber Security</h1>
        <div id="search_results">
          <?php researchCard($_SESSION['researchPages'][0]); ?>
          <?php researchCard($_SESSION['researchPages'][1]); ?>
          <?php researchCard($_SESSION['researchPages'][2]); ?>
          <?php researchCard($_SESSION['researchPages'][3]); ?>
        </div>
        <h6>thing</h6>
      </div>

      <div class="trio" id="second">
        <h1>Artificial Intelligence</h1>
        <div id="search_results">
          <?php researchCard($_SESSION['researchPages'][4]); ?>
          <?php researchCard($_SESSION['researchPages'][5]); ?>
          <?php researchCard($_SESSION['researchPages'][6]); ?>
          <?php researchCard($_SESSION['researchPages'][7]); ?>
        </div>
        <h6>thing</h6>
      </div>

      <div class="trio" id="third">
        <h1>Big Data</h1>
        <div id="search_results">
          <?php researchCard($_SESSION['researchPages'][8]); ?>
          <?php researchCard($_SESSION['researchPages'][9]); ?>
          <?php researchCard($_SESSION['researchPages'][10]); ?>
          <?php researchCard($_SESSION['researchPages'][11]); ?>
        </div>
        <h6>thing</h6>
      </div>
    </div>
    <?php genFooter();?>
    <script src="../scripts/landing.js"></script>
  </body>
</html>
