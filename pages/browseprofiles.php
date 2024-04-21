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
    <title>Research Profile Explore</title>
    <link rel="stylesheet" href="../styles/browseprofiles.css" />
  </head>
  <body>

  <?php genHeader();?>

    <div id="profiles-header">Profiles</div>

    <div id="main">
      <a class="tile" href="researcher1.html">Researcher 1</a>
      <a class="tile" href="researcher2.html">Researcher 2</a>
      <a class="tile" href="researcher3.html">Researcher 3</a>
      <a class="tile" href="researcher4.html">Researcher 4</a>
      <a class="tile" href="researcher5.html">Researcher 5</a>
      <a class="tile" href="researcher6.html">Researcher 6</a>
    </div>

    <?php genFooter();?>
  </body>
</html>
