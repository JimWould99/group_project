<?php

require_once('db.php');

$instance = MongoDatabase::getInstance();
$db = $instance->getConnection();

$document = $db->login->findOne(['Username' => 'Alice']);
var_dump($document);



?>