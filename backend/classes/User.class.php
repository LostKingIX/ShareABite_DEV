<?php
/**
 * User Class
 * 
 * This class is responsible for managing user-related data and operations within the application.
 * It provides methods to fetch and update user details in the MongoDB database.
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
     * @return array|null The user document if found, null otherwise.
     */
    public function getUser($user_id) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $user = $collection->findOne(['user_id' => (int)$user_id]);
        return $user;
    }

    /**
     * Updates a user's information in the database.
     *
     * @param int $user_id The ID of the user to update.
     * @param array $data The updated data of the user.
     * @return bool Returns true if the update was successful, false otherwise.
     */
    public function updateUser($user_id, $data) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $updateResult = $collection->updateOne(
            ['user_id' => (int)$user_id],
            ['$set' => $data]
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
            ['user_id' => (int)$user_id],
            ['$set' => ['profile_picture' => htmlspecialchars($picture_url)]]
        );
        return $updateResult->getModifiedCount() > 0;
    }
}
?>
