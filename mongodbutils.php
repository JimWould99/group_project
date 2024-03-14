<?php
require_once __DIR__ . '/vendor/autoload.php';

use Exception;
use MongoDB\Client;
use MongoDB\Driver\ServerApi;

// Replace the placeholder with your Atlas connection string
$uri = "mongodb+srv://pleb:Ps1tcg6gX4WH7uct@cluster0.ezscngt.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";

// Specify Stable API version 1
$apiVersion = new ServerApi(ServerApi::V1);

// Create a new client and connect to the server
$client = new MongoDB\Client($uri, [], ['serverApi' => $apiVersion]);

try {
    // Send a ping to confirm a successful connection
    $client->selectDatabase('admin')->command(['ping' => 1]);
    echo "Pinged your deployment. You successfully connected to MongoDB!\n";
} catch (Exception $e) {
    printf($e->getMessage());
}

/*

$db = $client->MongoDatabase->login;
$insertOneResult = $db->insertOne(['Username' => 'Alice', 'Email' => 'alice@email.com']);

*/
?>

