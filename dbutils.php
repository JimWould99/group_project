<?php  //file for db access methods
require_once('db.php');

//128-char randomly generated string for the pepper
$pepper = "z=mJZj0j4Bk;#(&m6Br3YvG;)y@[X1wqwPpt:{AW-W=/k-Y644.yM*B2hhU7(N(SXK+@5C1i=,}uZF({+fSVUM.cBH?ARZW/22-Jt-MHwAj}2fF!]v&(v}-[D(K13#t(";
//table for login info - currently [Username, Password]
$login = "login";
//
$raw_text = "raw_text";


function addText($raw_text) { //method to insert a string into db
    global $raw_text;
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();
    $stmt = $db->prepare("INSERT INTO $raw_text ( text ) VALUES ( ? )");
    $stmt->bind_param("s", $raw_text);
    $stmt->execute();
}

function searchTextField($search_string, $field_to_search) {//look for string in db
    global $raw_text;
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();
    $search_string = "%" . $search_string . "%";
    //$query = "SELECT * FROM raw_text WHERE $field_to_search LIKE '%'$search_string'%' ;"; //check for search string in a ny position in text field
    //$result = $mysqli->query($query);
    //this method is proper practice to avoid injections
    $stmt = $db->prepare("SELECT text FROM $raw_text WHERE $field_to_search LIKE ? ");
    $stmt->bind_param("s", $search_string);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

//stores a given plain password in the db for given username
function storeNewUser($username, $password) {
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();

    global $login;
    $passwordHashed = genPasswordHash($password); //make the secure password

    $stmt = $db->prepare("INSERT INTO $login VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $passwordHashed);
    $stmt->execute();
}
//returns the stored password in the db for the given username
function getPasswordFromDB($username) {
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();
    global $login;
    $stmt = $db->prepare("SELECT Password FROM $login WHERE UserName = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $finfo = $result->fetch_assoc();
    return $finfo["Password"];
}

//returns slated, peppered, and hashed password with 60 char length for given password
function genPasswordHash($password) {
    global $pepper;
    //peppers the password
    $passwordPeppered = hash_hmac("sha256", $password, $pepper);
    //hashes password with auto-genereated salt
    $passwordHashed = password_hash($passwordPeppered, PASSWORD_BCRYPT);
    //$passwordHashed is always 60 chars long
    return $passwordHashed;
}

//returns true if given password matches stored password for given user, false otherwise
function verifyPassword($username, $password) {
    global $pepper;
    $passwordPeppered = hash_hmac("sha256", $password, $pepper);
    $storedPassword = getPasswordFromDB($username);
    //passwqord verify is php function to test for match
    if (password_verify($passwordPeppered, $storedPassword)) {
        return True;
    }
    return False;
}

/* this uses POST to send the file to server, stored in $_FILES[]

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToSave" id="fileToSave">
  <input type="submit" value="Upload Image" name="submit">
</form>


<?php
echo "Filename: " . $_FILES['file']['name']."<br>";
echo "Type : " . $_FILES['file']['type'] ."<br>";
echo "Size : " . $_FILES['file']['size'] ."<br>";
echo "Temp name: " . $_FILES['file']['tmp_name'] ."<br>";
echo "Error : " . $_FILES['file']['error'] . "<br>";
?>


*/

$finalfilepath = $repopath . "/" . $username . basename($_FILES['fileToSave']['name']);

move_uploaded_file($_FILES['fileToSave']['tmp_name'], $finalfilepath); //moves the file from temp storage to disk



?>