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
      $profilePage = getProfilePage(($profileId));//set the profile page document to var
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


  $profile = getProfilePage($_id); // gets the profile data associated with the profile id
  //if arrived via post:
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($profilePage)) {
        //upload new profile picture
        if(isset($_FILES['uploadFile'])) {
          storeProfilePicture($_FILES['uploadFile'], $profilePage);
        }//upload given tile image
        if(isset($_FILES['uploadTile1'])) {
          echo 'tile 1';
          storeTileImage($_FILES['uploadTile1'], $profilePage, 1);
        }
        if(isset($_FILES['uploadTile2'])) {
          storeTileImage($_FILES['uploadTile2'], $profilePage, 2);
        }
        if(isset($_FILES['uploadTile3'])) {
          storeTileImage($_FILES['uploadTile3'], $profilePage, 3);
        }
        if(isset($_FILES['uploadTile4'])) {
          storeTileImage($_FILES['uploadTile4'], $profilePage, 4);
        }
        //reload profile page from db into session
        $profile = getProfilePage(($profilePage['_id']));
        $profilePage = $profile;
      }
    
  }

   $_SESSION['placeHolderProfilePicture'] = 'https://via.placeholder.com/150';

//fill tiles with placeholder images
   for ($x = 1; $x <= 4; $x++) {
     $_SESSION["tile{$x}"] = $_SESSION['placeHolderProfilePicture'];
   }


//check if anything exists to replace placeholder images, replace if it does
     for ($x = 1; $x <= 4; $x++) {
       if (isset($profilePage['Files']["tile{$x}"])) {
         $_SESSION["tile{$x}"] = $profilePage['Files']["tile{$x}"];
       }
     }
  // }


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
    <link rel="stylesheet" href="../styles/editprofile.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://unpkg.com/pell/dist/pell.min.css"
    />
  </head>
  <body>
  <?php genHeader($profileId,$accounttype);?>

    <div id="profile-header">Profile Information</div>

    <div id="main" id="sub-wrapper">
      <div id="sub-wrapper">
        <div class="tile">
          <img src=<?php echo $profile['ProfilePicture']; ?> alt="Researcher Image" />
          <div id="profile-picture-upload>">
            <form action="" method="post" enctype="multipart/form-data">
            Select file to upload:
            <input type="file" name="uploadFile" id="uploadFile">
            <input type="submit" value="Upload Profile Picture" name="submit">
            </form>
          </div>
        </div>
        <div id="editor"></div>
      </div>
      <form id="submitBio" action="../scripts/phpScripts/submitprofile.php?_id=<?= $_id?>" method="post">
      <?php echo '<textarea hidden name="Bio" id="markup">'.$profile['Bio'].'</textarea>' ;?>
      </form>
    </div>

    <div class="tiles-row">
      <div class="tile">
        <!-- First Interactable Tile -->
        Tile 1
        <img src=<?php echo $_SESSION['tile1']; ?> alt="Tile 1" />
        <form action="" method="post" enctype="multipart/form-data">
          Select file to upload:
          <input type="file" name="uploadTile1" id="uploadTile1">
          <input type="submit" value="uploadTile1" name="submit">
          </form>
      </div>
      <div class="tile">
        <!-- Second Interactable Tile -->
        Tile 2
        <img src=<?php echo $_SESSION['tile2']; ?> alt="Tile 2" />
        <form action="" method="post" enctype="multipart/form-data">
          Select file to upload:
          <input type="file" name="uploadTile2" id="uploadTile2">
          <input type="submit" value="uploadTile2" name="submit">
          </form>
      </div>
      <div class="tile">
        <!-- Third Interactable Tile -->
        Tile 3
        
        <form action="" method="post" enctype="multipart/form-data">
          Select file to upload:
          <input type="file" name="uploadTile3" id="uploadTile3">
          <input type="submit" value="uploadTile3" name="submit">
          </form>
      </div>
      <div class="tile">
        <!-- Fourth Interactable Tile -->
        Tile 4
      
        <form action="" method="post" enctype="multipart/form-data">
          Select file to upload:
          <input type="file" name="uploadTile4" id="uploadTile4">
          <input type="submit" value="uploadTile4" name="submit">
          </form>
      </div>
    </div>

    <button form="submitBio" type="submit">Change profile Bio</button>

    <?php genFooter();?>

    <!-- Include pell editor script -->
    <script src="https://unpkg.com/pell"></script>
    <script src="../scripts/pell.js"></script>
  </body>
</html>
