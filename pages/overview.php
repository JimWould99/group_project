<?php
	require_once('../templates/headertemplate.php');
	require_once('../templates/footertemplate.php');
	require_once('../templates/overviewtemplate.php');
	require_once('../dbutils/mongodbutils.php');
	require_once('../utils/utils.php');
	//ensure we are in session
	session_start();

	if (isset($_SESSION["username"])){
		$accounttype = getUserData($_SESSION["username"])["AccountType"];
		if ($accounttype != "asm"){
			//redirectHome();
		}
	} else{
		//redirectHome();
	}
	$profileId = getProfileId($_SESSION["username"]);
	
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
