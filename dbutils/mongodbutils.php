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
    if (is_null($document)) {return false;}
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
    if (is_null($document)) {return false;}
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

//'just for testing
function getAllUserData() {
    $db = getDB();
    $cursor = $db->UserData->find(
        [],
        [
            'sort' => ['Username' => 1],
        ]
    );
    return $cursor;
}

function getPassword($username) {
    $db = getDB();
    $document = $db->UserData->findOne(['Username' => $username]);
    if (is_null($document)) {return false;}
    return $document['Password'];
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

//create fresh profile page for new user during registration
//empty fields instantiated
function createProfilePage($username) {
    $db = getDB();
    $userData = getUserData($username);
    $document = $db->ProfilePage->insertOne([
        'Username' => $userData['Username'],
        'Name' => $userData['Name'],
        'AccountType' => $userData['AccountType'],//accountype will be either 'asm' for academic staff member, or ;ir; ofr industry representative
        'ProfilePicture' => '',
        'ContactInfo' => '',
        'Bio' => '',
        'Files' => [],
        'ResearchPages' => []
    ]);
    $profilePageID = $document->getInsertedId();
    //add profile page to the user
    $updatedUserData = $db->UserData->updateOne(
        ['Username' => $username],
        ['$set' => ['ProfilePage' => $profilePageID]]
    );
    return $profilePageID;
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
    $document = $db->ResearchPage->insertOne([
        'Username' => $username,
        'Title' => '',
        'Blurb' => '',
        'Body' => '',
        'Images' => [],
        'RejectMessage' => '',
        'Tags' => [],
        'Verified' => false,
        'CreatedTimestamp' => time(), // adds time since unix epoch as a creation timestamp
        'LastEditedTimestamp' => time()
    ]);
    return $document;
}

function getAllReasearchPages() {
    $db = getDB();
    $cursor = $db->ResearchPage->find(
        [],
        [
            'sort' => ['Username' => 1],
        ]
    );
    return $cursor;
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
    $db->ResearchPage->updateOne(
        ['_id' => $_id],
        ['$set' => ['LastEditedTimestamp' => time()]]
    );
}

function generateResearchCard(){// populates the search page with research cards
    foreach (getAllReasearchPages() as $document) {
        if ($document["Verified"] == true){ //CHANGE BACK TO == TRUE FOR CORRECT FUNCTIONALITY
            researchCard($document);
		}
    }
}

function generateApproveCard(){// populates the search page with research cards
    foreach (getAllReasearchPages() as $document) {
        if ($document["Verified"] == false){
            echo '<div class="approve_bar">';
            researchCard($document);
            approveCard($document["_id"]);
        }
        
    }
}

function setResearchPageVerification($_id, $status){// verifies the research page after being approved by an TTO
    $db = getDB();
    $db->ResearchPage->updateOne(
        ['_id'=>$_id],
        ['$set'=>['Verified'=> $status]]
    );
}

function setRejectMessage($_id, $rejectMessage){
    $db = getDB();
    $db->ResearchPage->updateOne(
        ['_id'=>$_id],
        ['$set'=>['RejectMessage'=>$rejectMessage]]
    );
}



//return research page document for given research page id
function getResearchPage($_id) {
    $db = getDB();
    $document = $db->ResearchPage->findOne(['_id' => $_id]);
    return $document;
}

//returns true if given user exists in db, false if they do not
function researchPageExists($_id){
    $db = getDB();
    $document = $db->ResearchPage->findOne(['_id' => $_id]);
    if (is_null($document)) {
        return false;
    }
    return true;
}

// deletes a research ppage
function deleteResearchPage($_id) {
    $db = getDB();
    $document = $db->ResearchPage->deleteOne(['_id' => $_id]);
}

//
function getAllResearchPages() {
    $db = getDB();
    $cursor = $db->ResearchPage->find(
        [],
        [
            'sort' => ['Title' => 1],
        ]);
    return $cursor;
}


//return all research pages assigned to given user
function getAllUsersResearchPages($username) {
    $db = getDB();
    $cursor = $db->ResearchPage->find(
        ['Username' => $username],
        []
    );
    return $cursor;
}

//return given number of most recently created research pages as a mongodb cursor object
function findRecentResearchPages($num) {
    $db = getDB();
    $cursor = $db->ResearchPage->find(
        [],
        [
            'limit' => $num,
            'sort' => ['LastEditedTimestamp' => -1],
        ]
    );
    return $cursor;
}


//returns true if given password matches stored password for given user, false otherwise
function verifyPassword($username, $password) {
    global $pepper;
    $passwordPeppered = hash_hmac("sha256", $password, $pepper);
    $storedPassword = getPassword($username);
    if (!$storedPassword) {return False;}//return false if password doesn't exist
    //password verify is php function to test for match
    if (password_verify($passwordPeppered, $storedPassword)) {
        return True;
    }
    return False;
}

//TODO: file management
$ds = DIRECTORY_SEPARATOR;
$repopath = "C:{$ds}xampp{$ds}htdocs{$ds}storage{$ds}";
$storageRoot = '/storage';
//e.g. str: \storage\testuser400\Ocelot.png'

function storeProfilePicture($file, $profilePage) {
    global $repopath;
    global $ds;
    global $storageRoot;
    $username = $profilePage['Username'];
    $finaldirpath = $repopath . $ds . $username . $ds;
    //ensure dir exists, mkdir if not
    if(!is_dir($finaldirpath)) {mkdir($finaldirpath);}
    $basename = basename($file['name']);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = "pp.{$extension}";
    $finalfilepath = $repopath . $username . $ds . $filename;
    move_uploaded_file($file['tmp_name'], $finalfilepath); //moves the file from temp storage to disk
    //convert serpators to be server friendly
    $storedFilePath = "{$storageRoot}/{$username}/{$filename}";
    updateProfilePage($profilePage['_id'], ['ProfilePicture' => $storedFilePath]);
}

function storeTileImage($file, $profilePage, $tileNum) {
    global $repopath;
    global $ds;
    global $storageRoot;
    $username = $profilePage['Username'];
    $finaldirpath = $repopath . $ds . $username . $ds;
    //ensure dir exists, mkdir if not
    if(!is_dir($finaldirpath)) {mkdir($finaldirpath);}
    $basename = basename($file['name']);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = "tile{$tileNum}.{$extension}";
    $finalfilepath = $repopath . $username . $ds . $filename;
    move_uploaded_file($file['tmp_name'], $finalfilepath); //moves the file from temp storage to disk
    //convert serpators to be server friendly
    $storedFilePath = "{$storageRoot}/{$username}/{$filename}";
    $oldProfileFiles = $profilePage['Files'];
    //convert the stored BSON array object into php array
    $oldProfileFiles = iterator_to_array($oldProfileFiles);
    $newProfileFiles = array_merge($oldProfileFiles, ["tile{$tileNum}" => $storedFilePath]);
    updateProfilePage($profilePage['_id'], ['Files' => $newProfileFiles]);
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

?>