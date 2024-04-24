<?php

//produce html for a research card with data from given research page document (rpd)
    function overviewCard($rpd) {
        echo "<div id='research_card' onchange='".$rpd['_id']."'>";
        echo "<p id='title'>" . $rpd['Title'] . "</p>";
        echo "<div id='image'></div>";
        if(isset($rpd['Images'][0])){echo "<img id='image' src=" . $rpd['Images'][0] . ">";}
        echo "<p id='short_bio'>" . $rpd["Blurb"] . "</p>";
        echo "<p id='author'>" . $rpd['Username'] . "</p>";// currently uses username, not author name
        echo "</div>";

    }

?>