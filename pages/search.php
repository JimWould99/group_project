<?php 
require_once('../dbutils/mongodbutils.php');
require_once('../utils/utils.php');
session_start();
use MongoDB\BSON\ObjectId;


include '../scripts/phpScripts/researchcard.php';

//make a script that generates or calls that function once for each research page?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../styles/styles.css" />
  </head>
  <body id="search_page">

  <?php include '../scripts/phpScripts/header.php';?>

      <div id="top_section">
        <div id="select_search">
            <label for="author_select">Author
            <input onclick="checkResults()" type="radio" name="account_type" class="second" id="author_select" value="author_select">
            <span class="checked"></span>
            </label>
            <label for="title_select">Title
            <input onclick="checkResults()" type="radio" name="account_type" class="second" id="title_select" value="title_select">
            <span class="checked"></span>
        </div>
          
            <div id="search_bar_section">
        <input
          type="text"
          id="search_bar"
          placeholder="Find research/ researchers"
          onkeyup="checkResults()"
        />
            </div>
      </div>
    <div id="search_results">
      
    <?php generateResearchCard() #runs the script that generates cards
    ?>

    </div>
    
    <?php include '../scripts/phpScripts/footer.php';?>
    <script src="../scripts/search.js"></script>
  </body>
</html>
