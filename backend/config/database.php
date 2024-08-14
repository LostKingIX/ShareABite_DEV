<?php
use MongoDB\Client;

/**
 * Database Class
 * 
 * This class is responsible for establishing connections to both MongoDB and MySQL databases.
 * It uses the MongoDB PHP library to connect to MongoDB and PDO for MySQL. The class contains 
 * necessary configuration details for both databases and provides methods to return the connection objects.
 */


class Database {
    private $mongoHost = "mongodb://localhost:27017";
    private $mongoDbName = "Share_bite_db"; // MongoDB database name

    private $mysqlHost = 'localhost';
    private $mysqlDbName = 'shareabite';
    private $mysqlUsername = 'root';
    private $mysqlPassword = '';

    public $mongoConn;
    public $mysqlConn;

    // Method to establish and return the MongoDB connection
    public function getMongoConnection() {
        $this->mongoConn = null;

        try {
            // Create a new MongoDB client
            $client = new MongoDB\Client($this->mongoHost);

            // Select the MongoDB database
            $this->mongoConn = $client->selectDatabase($this->mongoDbName);
        } catch (Exception $e) {
            // Output connection error message for MongoDB
            echo "MongoDB Connection error: " . $e->getMessage();
        }

        // Return the MongoDB connection object
        return $this->mongoConn;
    }

    // Method to establish and return the MySQL connection
    public function getMysqlConnection() {
        $this->mysqlConn = null;

        try {
            // Create a new PDO instance for MySQL
            $this->mysqlConn = new PDO("mysql:host={$this->mysqlHost};dbname={$this->mysqlDbName}", $this->mysqlUsername, $this->mysqlPassword);
            
            // Set the PDO error mode to exception
            $this->mysqlConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle connection error for MySQL
            die("MySQL Connection error: " . $e->getMessage());
        }

        // Return the MySQL connection object
        return $this->mysqlConn;
    }
}
?>
