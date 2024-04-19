<?php
require_once('../dbutils/mongodbutils.php');
require_once('../utils/utils.php');
session_start();


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
    <form action="../scripts/phpScripts/submitresearch.php" method="POST">
    <div id="main">
      <div id="intro_text">
        <input name="Title" id="title" placeholder="Default Research Title" id="title"type="text"> <!-- THIS IS THE TITLE OF THE TEXT-->
        <div id="editor-container">
          <div id="editor" class="pell"></div>
          <textarea hidden name="Body" id="markup"></textarea><!-- THIS IS THE BODY OF THE TEXT-->
        </div>
        <button type="submit">Submit Research</button>
      </div>
      <div class="research_trio">
        <div class="research">
          <img id="image1" src="research_image1.jpg" alt="Research Image 1" />
          <input type="text" id="image1-url" placeholder="THIS IS CURRENTLY A PLAEHOLDER THERE IS NOTHING HERE" />
          <textarea name="Blurb" rows="3" cols="40" placeholder="Please enter a blurb for your research, no more than 150 words as anything past that won't be displayed"></textarea> <!-- THIS IS THE blurb-->
        </div>
      </div>
    </div>
    </form>
    

 <!-- LEAVE TAGS AND IMAGES FOR LATER-->

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

    <script src="https://unpkg.com/pell"></script>
    <script  src="../scripts/pell.js"></script>
  </body>
</html>
