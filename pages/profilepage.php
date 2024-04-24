<?php
  require_once('../templates/headertemplate.php');
  require_once('../templates/footertemplate.php');
  require_once('../dbutils/mongodbutils.php');
  require_once('../utils/utils.php');
  //ensure we are in session
  session_start();

  if (isset($_SESSION["username"])){
    $profileId = getProfileId($_SESSION["username"]);
  } else {
    $profileId = "";
  }

  if (!getId()){
    redirectHome();
  } else{
    $_id = getId();
  }

  $profile = getProfilePage($_id);

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

  <?php genHeader($profileId);?>
    <div id="profile-header">Profile Information</div>

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
