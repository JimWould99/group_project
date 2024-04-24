<?php

  require_once('../templates/headertemplate.php');
  require_once('../templates/footertemplate.php');
  require_once('../templates/profiletemplate.php');
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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Research Profile Explore</title>
    <link rel="stylesheet" href="../styles/browseprofiles.css" />
  </head>
  <body>

  <?php genHeader($profileId,$accounttype);?>

    <div id="profiles-header">Profiles</div>

    <div id="main">
		<?php generateProfiles();	?>
    </div>

    <?php genFooter();?>
  </body>
</html>
