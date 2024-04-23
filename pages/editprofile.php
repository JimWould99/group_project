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
$_SESSION['bio'] = $_SESSION['placeholderText'];
$_SESSION['profilePicture'] = $_SESSION['placeHolderProfilePicture'];
$_SESSION['contactInfo'] = '';
$_SESSION['name'] = '';

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
    <link rel="stylesheet" href="../styles/editprofile.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://unpkg.com/pell/dist/pell.min.css"
    />
  </head>
  <body>
  <?php include '../scripts/phpScripts/header.php';?>

    <div id="profile-header">Profile Information</div>

    <div id="main">
      <div class="tile">
        <img src=<?php if ($_SESSION['profilePicture'] == '') {echo $_SESSION['placeHolderProfilePicture'];} else {echo $_SESSION['profilePicture'];}?> alt="Researcher Image" />
      </div>
      <div id="text-box"></div>
    </div>

    <div class="tiles-row">
      <div class="tile">
        <!-- First Interactable Tile -->
        Tile 1
      </div>
      <div class="tile">
        <!-- Second Interactable Tile -->
        Tile 2
      </div>
      <div class="tile">
        <!-- Third Interactable Tile -->
        Tile 3
      </div>
      <div class="tile">
        <!-- Fourth Interactable Tile -->
        Tile 4
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

    <!-- Include pell editor script -->
    <script src="https://unpkg.com/pell"></script>
    <script>
      // Initialize pell editor for Profile Information
      const profileInformationEditor = pell.init({
        element: document.getElementById("text-box"),
        onChange: (html) => console.log(html),
        defaultParagraphSeparator: "p",
        styleWithCSS: false,
        actions: [
          "bold",
          "italic",
          "underline",
          "strikethrough",
          "heading1",
          "heading2",
          "paragraph",
          "olist",
          "ulist",
          "link",
          "image",
          "quote",
          {
            name: "custom",
            icon: '<img src="https://via.placeholder.com/20" alt="Custom Icon">',
            title: "Custom Action",
            result: () => console.log("Custom action clicked"),
          },
        ],
      });
      profileInformationEditor.content.innerHTML = $_SESSION['bio'];
    </script>
  </body>
</html>
