<?php

//produce html for a research card with data from given research page document (rpd)
    function approveCard($_id) {
        echo'
            <div id="button_box">
                <a href="../scripts/phpScripts/approveresearch.php?_id='.$_id.'">
                    <button type="submit" id="approve_button">Approve</button>
                </a>
                <button id="reject">Reject</button>
            </div>
        <dialog open>
            <form method="POST" action="../scripts/phpScripts/rejectresearch.php?_id='.$_id.'">
                <label for="feedback">Rejection feedback</label>
                <input type="text" name="feedback" id="feedback" />
                <button id="submit" type="submit">Submit</button>
            </form>
        </dialog>
    </div>';
    }


//do this function first to generate research cards,

?>