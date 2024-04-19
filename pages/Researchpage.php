<?php
require_once('../dbutils/mongodbutils.php');
require_once('../utils/utils.php');
session_start();
use MongoDB\BSON\ObjectId;

$_id = new ObjectId($_GET["_id"]); 
$research = getResearchPage($_id);

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
        
      </div>
      <div class="research_trio">
        <div class="research">
          <img src="research_image1.jpg" alt="Research Image 1" />
        </div>
        <div class="research">
          <img src="research_image2.jpg" alt="Research Image 2" />
        </div>
        <div class="research">
          <img src="research_image3.jpg" alt="Research Image 3" />
        </div>
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
  </body>
</html>
