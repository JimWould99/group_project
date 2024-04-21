<?php
	require_once('../dbutils/mongodbutils.php');
	require_once('../utils/utils.php');
	use MongoDB\Model\BSONArray;
	use MongoDB\BSON\ObjectId;

	function generateResearchCard(){
		foreach (getAllReasearchPages() as $document) {
			$id = $document["_id"];
			$title = $document["Title"];
			$blurb = $document["Blurb"];
			$username = $document["Username"];
			$image = "";
			foreach ($document["Images"] as $element){ //This is incredibly jank, not sure how to fix it.
				$image = $element;
				break;
			}

			
			echo '<div id="research_card" onclick="location=\'researchpage.php?_id='.$id.'\'">'
			echo	'<p id="title">'.$title.'</p>'
			echo	'<img id="image" src="'.$image.'">'
			echo	'<p id="short_bio">'.$blurb.'</p>'
			echo	'<p id="author">'.$username.'</p>'
			echo '</div>';
		}// CURRENTLY THE AUTHORS NAME IS THEIR USERNAME
		// WHEN LOGIN IS FINALISED LOOK FOR THE FULL NAME, SEARCHING BASED ON USERNAME AND DO THAT VARIABLE INSTEAD

	}

?>