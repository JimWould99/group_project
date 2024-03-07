<!DOCTYPE html>
<html>
<head>
<title>Research Connect</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div id="header">
  <a href="landingpage.html">BrookesConnect</a>
</div> 

<h1>Welcome</h1>

<!-- You'll want to  make a for/while loop to make links for each-->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "researchconnect";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT pageid, pagetitle FROM pagelayout";
$result = mysqli_query($conn,$sql);

while ($results = mysqli_fetch_array($result))
{
    $test = $results["pageid"];
    $test2 = $results["pagetitle"];
    echo '<a href=researchpage.php?pageid='.$test.'>'.$test2.'</a>';
    echo "<br />";
}

?>


</body>
</html> 