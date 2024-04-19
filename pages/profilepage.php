<?php
require_once('../templates/landingpagetemplate.php');
require_once('../dbutils/mongodbutils.php');
require_once('../utils/utils.php');
//ensure we are in session
session_start();

$_SESSION['placeholderText'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
minim veniam, quis nostrud exercitation ullamco laboris nisi ut
aliquip ex ea commodo consequat.';
$_SESSION['placeHolderProfilePicture'] = 'https://via.placeholder.com/150';

if(isset($_SESSION['profilePage'])) {//set up vars to use to fill page
    $_SESSION['bio'] = $_SESSION['profilePage']['Bio'];//grab stored bio
    $_SESSION['profilePicture'] = $_SESSION['profilePage']['ProfilePicture'];//grab profile stored picture
    $_SESSION['contactInfo'] = $_SESSION['profilePage']['ContactInfo'];//grab stored contact info
    $_SESSION['name'] = $_SESSION['profilePage']['Name'];//grab stored name
  }


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

  <?php include '../scripts/phpScripts/header.php';?>
    <div id="profile-header">Profile Information</div>

    <div id="main">
      <div class="tile">
        <!-- Placeholder for researcher's image -->
        <img src=<?php if (isset($_SESSION['profilePicture'])) {echo $_SESSION['profilePicture'];} else {echo $_SESSION['placeHolderProfilePicture'];}?> alt="Researcher Image" />
      </div>
      <div id="text-box">
        <p>
          <?php if (isset($_SESSION['bio'])) {echo $_SESSION['bio'];} else {echo $_SESSION['placeholderText'];} ?>
        </p>
      </div>
    </div>

    <div id="key">
      <p><strong>Graduation:</strong> Ph.D. in [Field], [University Name]</p>
      <p><strong>Research Interests:</strong> [List of Research Interests]</p>
      <p><strong>Specializations:</strong> [List of Specializations]</p>
      <p>
        <strong>Contact Information:</strong> [Phone Number], [Email Address]
      </p>
    </div>

    <div id="footer_landing">
      <div class="sub_footer">
        <p>example_contact1</p>
        <p>example_contact2</p>
        <p>example_contact3</p>
        <p>example_contact3</p>
      </div>
      <p>Oxford Brookes University</p>
      <div class="sub_footer">
        <a href="#">Policies</a>
        <a href="#">Security</a>
        <a href="#">Website Acessibility</a>
        <a href="#">Manage cookies</a>
      </div>
    </div>
  </body>
</html>
