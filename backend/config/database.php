<?php
use MongoDB\Client;
 
/**
 * Database Class
 * 
 * This class is responsible for establishing a connection to the MongoDB database.
 * It uses the MongoDB PHP library to connect to the database server. The class contains 
 * the necessary configuration details such as the host and database name. The 
 * getConnection method attempts to create a new connection to the database and 
 * returns the connection object. If the connection fails, it catches the exception 
 * and outputs an error message.
 */

require 'vendor/autoload.php'; // Include Composer's autoloader

class Database {
    private $host = "mongodb://localhost:27017";
    private $db_name = "Share_bite_db"; // we will change this later
    public $conn;

    // Method to establish and return the database connection
    public function getConnection() {
        $this->conn = null;

        try {
            // Create a new MongoDB client
            $client = new MongoDB\Client($this->host);

            // Select the database
            $this->conn = $client->selectDatabase($this->db_name);
        } catch (Exception $e) {
            // Output connection error message
            echo "Connection error: " . $e->getMessage();
        }

        // Return the connection object
        return $this->conn;
    }
}
?>
