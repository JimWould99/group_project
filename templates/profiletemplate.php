<?php

//produce html for a research card with data from given research page document (rpd)
//make the url be to a 
    function profileCard($rpd) {
        echo '<a class="tile" href="profilepage.php?_id='.$rpd["_id"].'">';
        echo '<img src="https://www.telegraph.co.uk/multimedia/archive/03249/archetypal-female-_3249633c.jpg">';
        echo $rpd["Username"];
        echo '</a>';
    }

?>