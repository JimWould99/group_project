<?php

//produce html for a research card with data from given research page document (rpd)
function researchCard($rpd) {
    echo "<a href=" . getROOT() . "pages/ResearchPage.php?" . "id=" . $rpd['_id'] . ">\n";
    echo "<div id='research_card' onclick=" . "<?php redirectResearchPage(\$rpd['_id']) ?>" . ">" . "\n";
    echo "<p id='title'>" . $rpd['Title'] . "</p>" . "\n";
    echo "<div id='image'></div>" . "\n";
    //echo "<img src=" . $rpd['Images'][0] . ">" . "\n"; // might need to go back to <div id="image"></div> for css??
    echo "<p id='short_bio'>" . $rpd["Blurb"] . "</p>" . "\n";
    echo "<p id='author'>" . $rpd['Username'] . "</p>" . "\n";
    echo "</div>" . "\n";
    echo "</a>" . "\n";
}

?>