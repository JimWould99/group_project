<?php
require_once('../../dbutils/mongodbutils.php');
require_once('../../utils/utils.php');
session_start();
$username = "TESTINGresearch";# currently a default username as did not want to mess with login
$pageid = createResearchPage($username)->getInsertedId();
updateResearchPage($pageid, $_POST);

#indicate in some way that it was successful.

?>