<?php
require_once('mongodbutils.php');
require_once('../utils/utils.php');

$cursor = getAllResearchPages();
foreach ($cursor as $document) {
    var_dump($document);
}