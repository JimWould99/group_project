<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once('db.php');
//use Exception;
use MongoDB\Client;
use MongoDB\Driver\ServerApi;

//128-char randomly generated string for the pepper
$pepper = "z=mJZj0j4Bk;#(&m6Br3YvG;)y@[X1wqwPpt:{AW-W=/k-Y644.yM*B2hhU7(N(SXK+@5C1i=,}uZF({+fSVUM.cBH?ARZW/22-Jt-MHwAj}2fF!]v&(v}-[D(K13#t(";
//->UserData: Username, Email, Name, Password, AccountType, ProfilePage, ResearchPages,  _id
//->ProfilePage: Username, Name, AccountType, ProfilePicture, ContactInfo, Bio, Files, ResearchPages,  _id
//->ResearchPage: Title, Blurb, Body, Images, Tags, Username, _id, 

function getDB() {
    $instance = MongoDatabase::getInstance();
    return $instance->getConnection();
}

//returns true if given user exists in db, false if they do not
function userExists($username) {
    $db = getDB();
    $document = $db->UserData->findOne(['Username' => $username]);
    if (is_null($document)) {
        return false;
    }
    return true;
}

//returns username associated with given email
function getUsername($email) {
    $db = getDB();
    $document = $db->UserData->findOne(['Email' => $email]);
    return $document['Username'];
}

//returns true if given email exists in db, false if it does not
function emailExists($email) {
    $db = getDB();
    $document = $db->UserData->findOne(['Email' => $email]);
    if (is_null($document)) {
        return false;
    }
    return true;
}

function getEmail($username) {
    $db = getDB();
    $document = $db->UserData->findOne(['Username' => $username]);
    return $document['Email'];
}
//->UserData: Username, Email, Name, Password, AccountType, ProfilePage, ResearchPages, _id
//TODO: add Name + AccountType functionality
function createNewUser($username, $email, $accountType, $password) {
    $db = getDB();
    $passwordHashed = genPasswordHash($password); //make the secure password
    $document = $db->UserData->insertOne([
        'Username' => $username, 
        'Email' => $email,
        'Name' => '',
        'Password' => $passwordHashed,
        'AccountType' => $accountType,
        'ProfilePage' => '',
        'ResearchPages' => []
    ]);
}

function getUserData($username) {
    $db = getDB();
    $document = $db->UserData->findOne(['Username' => $username]);
    return $document;
}

function updatePassword($username, $password) {
    $db = getDB();
    $passwordHashed = genPasswordHash($password); //make the secure password

    $document = $db->UserData->updateOne(
        ['Username' => $username],
        ['$set' => ['Password' => $password]]
    );
}

function updateEmail($username, $email) {
    $db = getDB();

    $document = $db->UserData->updateOne(
        ['Username' => $username],
        ['$set' => ['Email' => $email]]
    );
}

function getPassword($username) {
    $db = getDB();

    $document = $db->UserData->findOne(['Username' => $username]);
    return $document['Password'];
}

//create fresh profile page for new user during registration
//empty fields instantiated
function createProfilePage($username) {
    $db = getDB();
    $userData = getUserData($username);
    $document = $db->ProfilePage->insertOne([
        'Username' => $userData['Username'],
        'Name' => $userData['Name'],
        'AccountType' => $userData['AccountType'],
        'ProfilePicture' => '',
        'ContactInfo' => '',
        'Bio' => '',
        'Files' => [],
        'ResearchPages' => []
    ]);
    //add profile page to the user
    $updatedUserData = $db->UserData->updateOne(
        ['Username' => $username],
        ['$set' => ['ProfilePage' => $document['_id']]]
    );
    return $document['_id'];
}

//replace given fields with given values for this profile page
//e.g. to save edits to ContactInfo and Bio - 
//updateProfilePage(_id, ['ContactInfo' => 'contact info, 'Bio' => 'bio text'])
function updateProfilePage($_id, $toUpdate) {
    $db = getDB();
    //awkwardly send seperate updates for each 
    foreach ($toUpdate as $field => $value) {
        $db->ProfilePage->updateOne(
            ['_id' => $_id],
            ['$set' => [$field => $value]]
        );
    }
}

function getProfilePage($_id) {
    $db = getDB();
    $document = $db->ProfilePage->findOne(['_id' => $_id]);
    return $document;
}
//->ResearchPage: Title, Blurb, Body, Images, Tags, Username, _id, 
//create fresh mostly empty research page
//return the generated if for the research page
function createResearchPage($username) {
    $db = getDB();
    $document = $db->ProfilePage->insertOne([
        'Username' => $username,
        'Title' => '',
        'Blurb' => '',
        'Body' => '',
        'Images' => [],
        'Tags' => [],
        'CreatedTimestamp' => time(), // adds time since unix epoch as a creation timestamp
        'LastEditedTimestamp' => time()
    ]);
    return $document['_id'];
}
//replace given fields with given values for this research page
//e.g. to save edits to Title and Blurb - 
//updateProfilePage(_id, ['Title' => 'title info, 'Blurb' => 'blurb text'])
function updateResearchPage($_id, $toUpdate) {
    $db = getDB();
    //awkwardly send seperate updates for each 
    foreach ($toUpdate as $field => $value) {
        $db->ResearchPage->updateOne(
            ['_id' => $_id],
            ['$set' => [$field => $value]]
        );
    }
}
//return research page document for given research page id
function getResearchPage($_id) {
    $db = getDB();
    $document = $db->ResearchPage->findOne(['_id' => $_id]);
    return $document;
}

//return given number of most recently created research pages
function findRecentResearchPages($num) {
    $db = getDB();
    $cursor = $db->find(
        [],
        [
            'limit' => $num,
            'sort' => ['LastEditedTimestamp' => -1],
        ]
    );
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

//TODO: file management


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
?>

