<?php
require_once('db.php');
//include_once('dbutils.php');
/*
$result = searchTextField("e", "text");
//iterates through each row of the result
foreach($result as $row){
    //echo $row;
    print_r($row);
}*/
//storeNewUser("testuser1", "weakpassword");
//storeNewUser("testuser2", "weakerpassword");
//$result = getPasswordFromDB("testuser0");

/*
$result = verifyPassword("testuser2", "weakerpassword");
echo $result;
*/
?>
<!DOCTYPE HTML>
<html>  
<body>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="file" name="uploadFile" id="uploadFile">
  <input type="submit" value="Upload" name="submit">
</form> 
</body>
</html>
