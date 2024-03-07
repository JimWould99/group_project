<?php
require_once('db.php');
require_once('dbutils.php');
//include_once('dbutils.php');

$rows = getUserFileURIs("testuser5");
$hardTest = "http://localhost:3000/Documents/uploads/testuser5/dbtesting.php";
print_r($rows);
echo "<table>"; // start a table tag in the HTML
foreach( $rows as $row) {   //Creates a loop to loop through results

echo "<tr><td>" . "<a href=$hardTest download>" .  htmlspecialchars(basename($row)) .  "</a>" . "</td></tr>";  //$row['index'] the index here is a field name
}



?>

