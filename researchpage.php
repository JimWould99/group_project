<!DOCTYPE html>
<html>
<head>
<title>BrookesConnect</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div id="header">
    <a href="landingpage.html">BrookesConnect</a>
</div> 

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "researchconnect";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['pageid'];
$sql = "SELECT pagetext,pagetitle FROM pagelayout where pageid = $id";
$result = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($result);

echo '<h1>'.$result["pagetitle"].'</h1><br>';
echo '<h2>'.$result["pagetext"].'</h2>';
?>


</body>
</html> 