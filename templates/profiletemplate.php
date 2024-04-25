<?php

//produce html for a research card with data from given research page document (rpd)
    function profileCard($rpd) {
        echo '<a class="tile" href="profilepage.php?_id='.$rpd["_id"].'">';
        echo '<img src="'.$rpd["ProfilePicture"].'">'; // TO DO change this to be dynamic
        echo $rpd["Username"];
        echo '</a>';
    }

?>