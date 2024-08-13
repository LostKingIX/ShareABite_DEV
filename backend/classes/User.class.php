<?php
/**
 * User Class
 * 
 * This class is responsible for managing user-related data and operations within the application.
 * It provides methods to fetch user details from the MongoDB database, ensuring that data is 
 * properly sanitized before being used in the application. The class constructor requires a 
 * database connection object to perform queries. The primary method, getUser, accepts a user ID, 
 * fetches the corresponding user's first and last name from the database, and stores these 
 * values in public properties for easy access in the presentation layer.
 */

class User {
    private $conn;
    private $collection_name = "users";

    public $first_name;
    public $last_name;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Retrieves a user's information from the database based on their user ID.
     *
     * @param int $user_id The ID of the user to retrieve.
     * @return void This function does not return a value, but it assigns the user's first and last names to the corresponding class properties if the user is found. 
     * If the user is not found, the class properties are set to empty strings.
     */
    public function getUser($user_id) 
    {
        // Select the 'users' collection
        $collection = $this->conn->selectCollection($this->collection_name);

        // Fetch the user document by user ID
        $user = $collection->findOne(['user_id' => (int)$user_id]); // CHANGE MADE: Cast user_id to int 

        // If user is found, sanitize and assign values
        if ($user) {
            $this->first_name = htmlspecialchars($user['first_name']);
            $this->last_name = htmlspecialchars($user['last_name']);
        } else {
            // Handle the case where the user is not found
            $this->first_name = '';
            $this->last_name = '';
        }
    }

    /**
     * Updates a user's information in the database.
     *
     * @param object $data An object containing the user's updated information.
     *                    The object should have the following properties:
     *                    - user_id: int - The ID of the user to update.
     *                    - firstName: string - The user's new first name.
     *                    - lastName: string - The user's new last name.
     *                    - dietaryPreferences: string - The user's new dietary preferences.
     * @return bool Returns true if the update was successful, false otherwise.
     */
    public function updateUser($data) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $updateResult = $collection->updateOne(
            ['user_id' => (int)$data->user_id], // CHANGE MADE Cast user_id to int 
            ['$set' => [
                'first_name' => htmlspecialchars($data->firstName),
                'last_name' => htmlspecialchars($data->lastName),
                'dietary_preferences' => htmlspecialchars($data->dietaryPreferences)
            ]]
        );
        return $updateResult->getModifiedCount() > 0;
    }

    /**
     * Updates the profile picture of a user in the database.
     *
     * @param int $user_id The ID of the user whose profile picture is being updated.
     * @param string $picture_url The URL of the new profile picture.
     * @return bool Returns true if the update was successful, false otherwise.
     */
    public function updateProfilePicture($user_id, $picture_url) {
        $collection = $this->conn->selectCollection($this->collection_name);
        $updateResult = $collection->updateOne(
            ['user_id' => (int)$user_id], // CHANGE MADE: Cast user_id to int 
            ['$set' => ['profile_picture' => htmlspecialchars($picture_url)]]
        );
        return $updateResult->getModifiedCount() > 0;
    }
}
?>
