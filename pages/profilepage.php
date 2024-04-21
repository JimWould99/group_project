<?php
require_once('../templates/headertemplate.php');
require_once('../templates/footertemplate.php');
require_once('../dbutils/mongodbutils.php');
require_once('../utils/utils.php');
//ensure we are in session
session_start();


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

  <?php genHeader();?>
    <div id="profile-header">Profile Information</div>

    <div id="main">
      <div class="tile">
        <!-- Placeholder for researcher's image -->
        <img src="https://via.placeholder.com/150" alt="Researcher Image" />
      </div>
      <div id="text-box">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
          minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commodo consequat.
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

    <?php genFooter();?>
  </body>
</html>
