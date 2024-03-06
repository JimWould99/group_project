<?php

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
  
?>