<head>
<title>Research Connect</title>
<link rel="stylesheet" href="styles.css">
</head>
<div id="header">
    <a href="landingpage.html">BrookesConnect</a>

</div> 


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "researchconnect";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$research = $_REQUEST["research"];
$title = $_REQUEST["title"];


$sql = "INSERT INTO pagelayout(pagetext, pagetitle)
VALUES (?,?)";

$conn->execute_query($sql, [$research,$title]);
echo "New research page made";


$conn->close();
?> 