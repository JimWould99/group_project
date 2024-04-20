<?php
require_once('../dbutils/mongodbutils.php');
require_once('../utils/utils.php');
use MongoDB\Model\BSONArray;
use MongoDB\BSON\ObjectId;

function generateResearchCard(){
  foreach (getAllReasearchPages() as $document) {
    $_id = $document["_id"];
    $_title = $document["Title"];
    $blurb = $document["Blurb"];
    $username = $document["Username"];
    $image = "";
    foreach ($document["Images"] as $element){ //This is incredibly jank, not sure how to fix it.
      $image = $element;
      break;
    }
    
    echo 
    '<div id="research_card" onclick="location=\'researchpage.php?_id='.$_id.'\'">
      <p id="title">'.$_title.'</p>
      <img id="image" src="'.$image.'">
      <p id="short_bio">'.$blurb.'</p>
      <p id="author">'.$username.'</p>
      </div>';
  }// CURRENTLY THE AUTHORS NAME IS THEIR USERNAME
  // WHEN LOGIN IS FINALISED LOOK FOR THE FULL NAME, SEARCHING BASED ON USERNAME AND DO THAT VARIABLE INSTEAD

  
}



?>