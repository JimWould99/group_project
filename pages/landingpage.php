<?php
require_once('../templates/landingpagetemplate.php');
require_once('../dbutils/mongodbutils.php');
require_once('../utils/utils.php');
//ensure we are in session
session_start();
//get 9 most recent edited research pages
$cursor = findRecentResearchPages(9);
//print_r($cursor);
$_SESSION['researchPages'] = [];

foreach ($cursor as $document) {
  array_push($_SESSION['researchPages'], $document);
  
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
    <div id="header">
      <a href="#">BrookesConnect</a>
      <div id="info">
        <a href="#">About</a>
        <a href="browseresearch.php">Browse Research</a>
        <a href="browseprofiles.html">Browse Profiles</a>
        <a href="create research.html">Create research page</a>
      </div>
      <?php if(!isset($_SESSION['username'])) {
      ?>  
        <a href=<?php genLink('pages/sign_up.php')?>>Account</a>
      <?php } else { ?>
        <a href=<?php genLink('pages/profilepage.php')?>>Your Profile</a>
      <?php } ?>
      <?php if(isset($_SESSION['username'])) {
      ?>
        <a href=<?php genLink('pages/logout.php')?>>Log Out</a>
      <?php } ?>
     
    </div>
    <div id="main_landing">
      <div id="background">
        <div id="intro_text">
          <p>Welcome example example_user to research_site</p>
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
        </div>
        <h6>thing</h6>
      </div>

      <div class="trio" id="second">
        <h1>Artificial Intelligence</h1>
        <div id="search_results">
          <?php researchCard($_SESSION['researchPages'][3]); ?>
          <?php researchCard($_SESSION['researchPages'][4]); ?>
          <?php researchCard($_SESSION['researchPages'][5]); ?>
        </div>
        <h6>thing</h6>
      </div>

      <div class="trio" id="third">
        <h1>Big Data</h1>
        <div id="search_results">
          <?php researchCard($_SESSION['researchPages'][6]); ?>
          <?php researchCard($_SESSION['researchPages'][7]); ?>
          <?php researchCard($_SESSION['researchPages'][8]); ?>
        </div>
        <h6>thing</h6>
      </div>
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
    <script src="../scripts/landing.js"></script>
  </body>
</html>
