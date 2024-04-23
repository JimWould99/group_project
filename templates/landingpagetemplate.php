<?php

//produce html for a research card with data from given research page document (rpd)
    function researchCard($rpd) {
        echo "<div id='research_card' onclick='location=\"researchpage.php?_id=".$rpd['_id']."\"'>";
        echo "<p id='title'>" . $rpd['Title'] . "</p>";
        echo "<div id='image'></div>";
        echo "<img id='image' src=" . $rpd['Images'][0] . ">"; // breaks if an image isn't uploaded, and also css breaks if image too big
        echo "<p id='short_bio'>" . $rpd["Blurb"] . "</p>";
        echo "<p id='author'>" . $rpd['Username'] . "</p>";// currently uses username, not author name
        echo "</div>";

    }

?>