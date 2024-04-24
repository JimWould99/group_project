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

  $profile = getProfilePage($_id); // gets the profile data associated with the profile id

  // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //     if (isset($_POST['edit_profile'])) {
  //         redirect('editprofile.php');
  //     }
  // }

  $_SESSION['placeholderText'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
  minim veniam, quis nostrud exercitation ullamco laboris nisi ut
  aliquip ex ea commodo consequat.';
  $_SESSION['placeHolderProfilePicture'] = 'https://via.placeholder.com/150';
  $_SESSION['bio'] = '';
  $_SESSION['profilePicture'] = '';
  $_SESSION['contactInfo'] = '';
  $_SESSION['name'] = '';

  // if(isset($_SESSION['profilePage'])) {//set up vars to use to fill page
  //     $_SESSION['bio'] = $_SESSION['profilePage']['Bio'];//grab stored bio
  //     $_SESSION['profilePicture'] = $_SESSION['profilePage']['ProfilePicture'];//grab profile stored picture
  //     $_SESSION['contactInfo'] = $_SESSION['profilePage']['ContactInfo'];//grab stored contact info
  //     $_SESSION['name'] = $_SESSION['profilePage']['Name'];//grab stored name
  //   }


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
    <link rel="stylesheet" href="../styles/profilepage.css" />
  </head>
  <body>

  <?php genHeader($profileId,$accounttype);?>
    <div id="profile-header"><?php echo $profile['Username'];?></div>

    <div id="main">
      <div class="tile">
        <!-- Placeholder for researcher's image -->
        <img src=<?php if ($profile['ProfilePicture'] == '') {echo $_SESSION['placeHolderProfilePicture'];} else {echo $profile['ProfilePicture'];}?> alt="Researcher Image" />
      </div>
      <div id="text-box">
        <p>
          <?php if ($profile['Bio'] == '') {echo $_SESSION['placeholderText'];} else {echo $profile['Bio'];} ?>
        </p>
      </div>
    </div>

    <div id="key">
      <p><strong>Graduation:</strong> Ph.D. in [Field], [University Name]</p>
      <p><strong>Research Interests:</strong> [List of Research Interests]</p>
      <p><strong>Specializations:</strong> [List of Specializations]</p>
      <p><strong>Contact Information:</strong> [Phone Number], [Email Address]</p>
    </div>

    
    <div id="button_to_edit_profile_page">
      <form action="editprofile.php?_id=<?= $_id?>" method="post">
        <button name="edit_profile" value="edit_profile">Edit Profile</button>
      </form>
    </div>
    <?php genFooter();?>
  </body>
</html>
