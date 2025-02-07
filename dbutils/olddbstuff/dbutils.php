<?php  //file for db access methods
require_once('db.php');

//128-char randomly generated string for the pepper
$pepper = "z=mJZj0j4Bk;#(&m6Br3YvG;)y@[X1wqwPpt:{AW-W=/k-Y644.yM*B2hhU7(N(SXK+@5C1i=,}uZF({+fSVUM.cBH?ARZW/22-Jt-MHwAj}2fF!]v&(v}-[D(K13#t(";
//table for login info - currently [UserName, Password]
//TODO: find replace UserName, username
$login = "login";
//
$raw_text = "raw_text";
$files = "Files";//Files table storing File URI


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

//checks if given username is already a user in the db
//true if the exist, false if no entry, null in other erroneous case
function userExists($username) {
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();

    global $login;
    $stmt = $db->prepare("SELECT * FROM $login where UserName = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if(($result->num_rows) == 1) {
        return true;
    }
    if(($result->num_rows) == 0) {
        return false;
    }
    return NULL;
}

//get username associated with given email
function getUsername($email) {
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();

    global $login;
    $stmt = $db->prepare("SELECT UserName FROM $login where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $info = $result->fetch_assoc();
    if(isset($info["UserName"])) {
        return $info["UserName"];
    }
}

//checks if given email is already in the db
//true if the exist, false if no entry, null in other erroneous case
function emailExists($email) {
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();

    global $login;
    $stmt = $db->prepare("SELECT * FROM $login where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if(($result->num_rows) == 1) {
        return true;
    }
    if(($result->num_rows) == 0) {
        return false;
    }
    return NULL;
}

//get the email associaed with given username
function getEmail($username) {
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();

    global $login;
    $stmt = $db->prepare("SELECT Email FROM $login where username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    $info = $result->fetch_assoc();
    if(isset($info["Email"])) {
        return $info["Email"];
    }
}




//stores a given plain password in the db for given username
//TODO: add email
function storeNewUser($username, $password) {
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();

    global $login;
    $passwordHashed = genPasswordHash($password); //make the secure password

    $stmt = $db->prepare("INSERT INTO $login VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $passwordHashed);
    $stmt->execute();
}

function updatePassword($username, $password) {
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();

    global $login;
    $passwordHashed = genPasswordHash($password); //make the secure password

    $stmt = $db->prepare("UPDATE $login SET Password = ? WHERE UserName = ?");
    $stmt->bind_param("ss", $passwordHashed, $username);
    $stmt->execute();
}

function updateEmail($username, $email) {
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();

    global $login;

    $stmt = $db->prepare("UPDATE $login SET Email = ? WHERE UserName = ?");
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
}


//returns the stored password in the db for the given username
//returns NULL when username is not present in db
function getPasswordFromDB($username) {
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();
    global $login;
    $stmt = $db->prepare("SELECT Password FROM $login WHERE UserName = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $info = $result->fetch_assoc();
    if(isset($info["Password"])) {
        return $info["Password"];
    }
    return NULL;
}

//returns salted, peppered, and hashed password with 60 char length for given password
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

//Files table: FileID (auto-PK), Username, FileType, URI
//returns TRUE when succesful, NULL when not due to file already existingin DB
function storeUploadedFileURI($username, $fileType, $URI) {
    global $files;
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();
    //check if file is already present for user
    if (checkURIExists($URI)) {return NULL;}

    $stmt = $db->prepare("INSERT INTO $files (Username, FileType, URI) VALUES ( ?, ?, ? )");
    $stmt->bind_param("sss",$username, $fileType, $URI);
    $stmt->execute();
    return TRUE;
}

function checkURIExists($URI) {
    global $files;
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();

    $stmt = $db->prepare("SELECT URI FROM $files WHERE URI = ?");
    $stmt->bind_param("s", $URI);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {return NULL;}
    return TRUE;
}

//delete given URI from db
function deleteUploadedFileURI($URI) {
    global $files;
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();

    $stmt = $db->prepare("DELETE FROM $files where URI = $URI");
    $stmt->bind_param("s", $URI);
    $stmt->execute();
}

//returns an array containing all URIs for given user, NULL if none exist
function getUserFileURIs($username) {
    global $files;
    $instance = DataBase::getInstance();
    $db = $instance->getConnection();

    $stmt = $db->prepare("SELECT URI FROM $files WHERE UserName = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    //check for no URIs
    if ($result->num_rows == 0) {return NULL;}

    $toReturn = array();
    while($row = $result->fetch_assoc()) {
        array_push($toReturn, $row['URI']);//append URIs into array
    }
    return $toReturn;
}

/*
//check for non zero result then print out results row by row:
if ($result→num_rows > 0) {
    while($row = $result→fetch_assoc()) {
        printf("Id: %s, Title: %s, Author: %s, Date: %d <br />", 
        $row["tutorial_id"], 
        $row["tutorial_title"], 
        $row["tutorial_author"],
        $row["submission_date"]);               
    }
}
*/
?>