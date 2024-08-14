<?php
use MongoDB\Client;

/**
 * Database Class
 * 
 * This class is responsible for establishing a connection to the MongoDB database.
 * It uses the MongoDB PHP library to connect to the MongoDB server. The class contains 
 * the necessary configuration details such as the host and database name, and provides 
 * a method to return the connection object.
 */


class Database {
    private $mongoHost = "mongodb://localhost:27017"; // MongoDB host
    private $mongoDbName = "Share_bite_db"; // MongoDB database name

    public $mongoConn;

    // Method to establish and return the MongoDB connection
    public function getMongoConnection() {
        $this->mongoConn = null;

        try {
            // Create a new MongoDB client
            $client = new Client($this->mongoHost);

            // Select the MongoDB database
            $this->mongoConn = $client->selectDatabase($this->mongoDbName);
        } catch (Exception $e) {
            // Output connection error message for MongoDB
            echo "MongoDB Connection error: " . $e->getMessage();
        }

        // Return the MongoDB connection object
        return $this->mongoConn;
    }
}
?>
