<?php
require_once __DIR__ . '/vendor/autoload.php';

use Exception;
use MongoDB\Client;
use MongoDB\Driver\ServerApi;

//128-char randomly generated string for the pepper
$pepper = "z=mJZj0j4Bk;#(&m6Br3YvG;)y@[X1wqwPpt:{AW-W=/k-Y644.yM*B2hhU7(N(SXK+@5C1i=,}uZF({+fSVUM.cBH?ARZW/22-Jt-MHwAj}2fF!]v&(v}-[D(K13#t(";
//->login: Username, Email, Password

function getDB() {
    $instance = MongoDatabase::getInstance();
    return $instance->getConnection();
}

//returns true if given user exists in db, false if they do not
function userExists($username) {
    $db = getDB();
    $document = $db->login->findOne(['Username' => $username]);
    if (is_null($document)) {
        return false;
    }
    return true;
}

//returns username associated with given email
function getUsername($email) {
    $db = getDB();
    $document = $db->login->findOne(['Email' => $email]);
    return $document['Username'];
}

//returns true if given email exists in db, false if it does not
function emailExists($email) {
    $db = getDB();
    $document = $db->login->findOne(['Email' => $email]);
    if (is_null($document)) {
        return false;
    }
    return true;
}

function getEmail($username) {
    $db = getDB();
    $document = $db->login->findOne(['Username' => $username]);
    return $document['Email'];
}

function storeNewUser($username, $email, $password) {
    $db = getDB();
    $passwordHashed = genPasswordHash($password); //make the secure password
    $document = $db->login->insertOne([
        'Username' => $username, 
        'Email' => $email,
        'Password' => $passwordHashed
    ]);
}

function updatePassword($username, $password) {
    $db = getDB();
    $passwordHashed = genPasswordHash($password); //make the secure password

    $document = $db->login->updateOne(
        ['Username' => $username],
        ['$set' => ['Password' => $password]]
    );
}

function updateEmail($username, $email) {
    $db = getDB();

    $document = $db->login->updateOne(
        ['Username' => $username],
        ['$set' => ['Email' => $email]]
    );
}

function getPassword($username) {
    $db = getDB();

    $document = $db>findOne(['Username' => $username]);
    return $document['Password'];
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

