<?php

//produce html for a research card with data from given research page document (rpd)
    function researchCard($rpd) {
        echo "<div id='research_card' onclick='location=\"researchpage.php?_id=".$rpd['_id']."\"'>";
        echo "<p id='title'>" . $rpd['Title'] . "</p>";
        if(isset($rpd['Images']["thumbnail".$rpd['_id']])){echo "<img id='image' src=" . $rpd['Images']["thumbnail".$rpd['_id']] . ">";}
        echo "<p id='short_bio'>" . $rpd["Blurb"] . "</p>";
        echo "<p id='author'>" . $rpd['Username'] . "</p>";// currently uses username, not author name
        echo "</div>";

    }

?>