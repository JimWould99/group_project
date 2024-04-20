<?php
require_once('../dbutils/mongodbutils.php');
require_once('../utils/utils.php');
session_start();
use MongoDB\BSON\ObjectId;
$newPage = TRUE;


if(isset($_GET["_id"])){#checks if it has received an ID, if so it's editing an exisitng page if not making a new one
  $_id = new ObjectId($_GET["_id"]); 
  $research = getResearchPage($_id);
  $newPage = FALSE;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brookes Connect</title>
    <link rel="stylesheet" href="../styles/editresearchpage.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://unpkg.com/pell/dist/pell.min.css"
    />
  </head>
  <body>
  <?php include '../scripts/phpScripts/header.php';?>
    <?php echo'<form action="../scripts/phpScripts/submitresearch.php?_id='.$_GET["_id"].'" method="POST">'?>
    <div id="main">
      <div id="intro_text">
        <?php
        if ($newPage == FALSE){
          echo'<input name="Title" id="title" placeholder="Default Research Title" id="title" value="'.$research["Title"].'" type="text">';
        } else {
          echo'<input name="Title" id="title" placeholder="Default Research Title" id="title" value="" type="text">';
        }
         ?><!-- THIS IS THE TITLE OF THE TEXT-->
        <div id="editor-container">
          <div id="editor" class="pell"></div>
          <?php
            if ($newPage == FALSE){
              echo'<textarea hidden name="Body" id="markup">'.$research["Body"].'</textarea>';
            } else {
              echo'<textarea hidden name="Body" id="markup"></textarea>';
            }
            ?><!-- THIS IS THE body-->

        </div>
        <button type="submit">Submit Research</button>
      </div>
      <div class="research_trio">
        <div class="research">
          <img id="image1" src="research_image1.jpg" alt="Research Image 1" />
          <input type="text" id="image1-url" placeholder="THIS IS CURRENTLY A PLAEHOLDER THERE IS NOTHING HERE" />
          <?php
          if ($newPage == FALSE){
            echo'<textarea name="Blurb" rows="3" cols="40" placeholder="Please enter a blurb for your research, no more than 150 words as anything past that will not be displayed">'.$research["Blurb"].'</textarea>';
          } else {
            echo'<textarea name="Blurb" rows="3" cols="40" placeholder="Please enter a blurb for your research, no more than 150 words as anything past that will not be displayed"></textarea>';
          }
           ?><!-- THIS IS THE blurb-->
        </div>
      </div>
    </div>
    </form>
    
 <!-- LEAVE TAGS AND IMAGES FOR LATER-->
    <?php include '../scripts/phpScripts/footer.php';?>

    <script src="https://unpkg.com/pell"></script>
    <script src="../scripts/pell.js"></script>
  </body>
</html>
