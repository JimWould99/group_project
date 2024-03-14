<?php

require_once __DIR__ . '/vendor/autoload.php';

use Exception;
use MongoDB\Client;
use MongoDB\Driver\ServerApi;

//singleton database class -- use the below to generate the database connection
//$instance = DataBase::getInstance();
//$db = $instance->getConnection();
class DataBase{

    private static $instance = null;
    private $db;
     
    // The db connection is established in the private constructor.
    private function __construct() {
        $host = "localhost";
        $username = "pleb";
        $password = "plebpleb";
        $database = "test";
        $this->db = new mysqli($host, $username, $password, $database);
    }
    
    public static function getInstance() {
        if(!self::$instance)
        {
          self::$instance = new DataBase();
        }
     
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->db;
    }
  }

  //$instance = MongoDatabase::getInstance();
  //$db = $instance->getConnection();
  class MongoDatabase{

    private static $instance = null;
    private $db;
     
    // The db connection is established in the private constructor.
    private function __construct() {
        $uri = "mongodb+srv://pleb:Ps1tcg6gX4WH7uct@cluster0.ezscngt.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";
        $apiVersion = new ServerApi(ServerApi::V1);

        // Create a new client and connect to the server
        //using the MongoDatabase database
        $this->db = (new MongoDB\Client($uri, [], ['serverApi' => $apiVersion]))->MongoDatabase;
    }
    
    public static function getInstance() {
        if(!self::$instance)
        {
          self::$instance = new MongoDatabase();
        }
     
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->db;
    }
  }
  
?>