<?php
include_once('dbutils.php');
//TODO make this server specific
$repopath = "/Users/gc/Documents/uploads";
//TODO:
//need method to get username for saving files in their dir
//e.g.:
//$username = $_SESSION["username"]; 
$username = "testuser5";

/* this uses POST to send the file to server, stored in $_FILES['uploadFile']

<form action="upload_file.php" method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="file" name="uploadFile" id="uploadFile">
  <input type="submit" value="Upload" name="submit">
</form> 

examples of file variables
echo "Filename: " . $_FILES['file']['name']."<br>";
echo "Type : " . $_FILES['file']['type'] ."<br>";
echo "Size : " . $_FILES['file']['size'] ."<br>";
echo "Temp name: " . $_FILES['file']['tmp_name'] ."<br>";
echo "Error : " . $_FILES['file']['error'] . "<br>";


*/

//TODO add validation and various checks such as existence, size, type...

$finaldirpath = $repopath . "/" . $username . "/";

//make directory if it doesn't already exist, else the moving will fail
if(!is_dir($finaldirpath)) {mkdir($finaldirpath);}


$finalfilepath = $repopath . "/" . $username . "/" . basename($_FILES['uploadFile']['name']);
move_uploaded_file($_FILES['uploadFile']['tmp_name'], $finalfilepath); //moves the file from temp storage to disk
storeUploadedFileURI($username, $_FILES['uploadFile']['type'], $finalfilepath);
echo "test";
print_r(getUserFileURIs($username));

?>