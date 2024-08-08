<?php
/**
 * upload_picture.php
 * 
 * This script handles the uploading of a new user profile picture and stores it in a local directory.
 * It receives the file from the front-end via a POST request, saves the file to a specified directory
 * (using a Docker volume), and updates the user's profile picture URL in the MongoDB database.
 */

require 'vendor/autoload.php';
include_once 'config/database.php';
include_once 'user.class.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

if ($_FILES['profile_picture']['error'] == UPLOAD_ERR_OK) {
    // Define the upload directory (inside the Docker container)
    $uploadDir = '/var/www/html/uploads/';
    $uploadFile = $uploadDir . basename($_FILES['profile_picture']['name']);

    // Move uploaded file to the target directory
    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
        // Update user's profile picture URL in the database
        $user_id = 1; // Example user ID
        $user->updateProfilePicture($user_id, $uploadFile);

        // Send success response with the new picture URL
        echo json_encode(['success' => true, 'picture_url' => $uploadFile]);
    } else {
        echo json_encode(['success' => false, 'message' => 'File upload failed']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No file uploaded']);
}
?>
