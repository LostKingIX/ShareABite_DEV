<?php
/**
 * update_profile.php
 * 
 * This script handles the updating of user profile information. It receives data from
 * the front-end via a POST request, decodes the JSON data, and updates the user information
 * in the MongoDB database. It sends a JSON response indicating the success or failure of the update.
 */

    // Include database and user classes
    require 'vendor/autoload.php';
    include_once 'config/database.php';
    include_once 'user.class.php';

    // Instantiate database and user objects
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    // Get the POST data
    $data = json_decode(file_get_contents("php://input"));

        if ($data) 
        {
            // Update user data
            $updateResult = $user->updateUser($data);

            // Send response
            if ($updateResult) 
            {
                echo json_encode(['success' => true]);
            } 
            else 
            {
                echo json_encode(['success' => false]);
            }
        } 
        
        else 
        {
            // No data received
            echo json_encode(['success' => false, 'message' => 'No data received']);
        }
?>
