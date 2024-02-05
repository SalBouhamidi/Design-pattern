<?php
    class Singloton
    {
        private static $instance;
        private $connect;
        private $username ="root";
        private $dbname;
        private $pwd="";
        private $host="localhost";

        private function __construct(){

        try {
            $this->connect = new PDO("mysql:host=localhost;dbname=crudd", $this->username, $this->pwd);
            // set the PDO error mode to exception
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
        }
        public static function getInstance()
        {
            if (self::$instance === null) {
                self::$instance = new self();
            }
            
            return self::$instance;
        }
    }
$singleobject = Singloton:: getInstance();

$singleobject2 = Singloton:: getInstance();
var_dump($singleobject2);
die();

?>