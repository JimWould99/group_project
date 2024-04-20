<?php
require_once('../dbutils/mongodbutils.php');
require_once('../utils/utils.php');
session_start();
use MongoDB\BSON\ObjectId;
if(isset($_GET["_id"])){ // if the id is real carry on as normal
  $_id = new ObjectId($_GET["_id"]); #Bug currently exists where if there is an id from GET but it's invalid page crashes
  $research = getResearchPage($_id); # does not cover cases where a valid id is entered but does not exist in the db FIX ME
} else {
  header("Location: landingpage.php"); //redirects user back to homepage
  die(); //stops the page as it should only exist for each research page
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brookes Connect</title>
    <link rel="stylesheet" href="../styles/researchpage.css" />
  </head>
  <body>

  <?php include '../scripts/phpScripts/header.php';?>
    <div id="main">
      <div id="intro_text">
        <?php 
        echo "<p>".$research["Title"]."</p>";
        echo "<p>".$research["Body"]."</p>";
        ?>
        <form action="../scripts/phpScripts/deleteresearch.php" method="post">
          <input hidden name="id_director" value="<?= $_id?>" />
        <button>Delete Research</button>
        </form>
        <?php
        echo'<form action="editresearchpage.php?_id='.$_id.'" method="post">';
        ?>

          <input hidden name="id_director" value="<?= $_id?>" />
        <button>Edit Research page</button>
        </form>
        
      </div>
      <div class="research_trio">
        <div class="research">
          <img src="research_image1.jpg" alt="Research Image 1" />
        </div>
      </div>
    </div>

    <?php include '../scripts/phpScripts/footer.php';?>
  </body>
</html>
