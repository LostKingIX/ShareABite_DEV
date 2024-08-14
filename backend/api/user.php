<?php
require_once '../classes/User.class.php';
require_once '../config/database.php';

// Initialize the Database and User classes
$database = new Database();
$db = $database->getMongoConnection(); // Use getMongoConnection() to connect to MongoDB

$user = new User($db);

// Determine the HTTP request method
$method = $_SERVER['REQUEST_METHOD'];

// Handle the request based on the HTTP method
switch ($method) {
    case 'GET':
        // Handle GET requests
        if (isset($_GET['id'])) {
            // Fetch user data by ID
            $userData = $user->getUser((int)$_GET['id']);
            if ($userData) {
                // If user is found, return their data as JSON
                $response = [
                    'first_name' => $userData['first_name'],
                    'last_name' => $userData['last_name'],
                    'email' => $userData['email']
                ];
                echo json_encode($response);
            } else {
                // If user is not found, return a 404 error
                http_response_code(404);
                echo json_encode(["message" => "User not found"]);
            }
        } else {
            // If no ID is provided, return a 400 error
            http_response_code(400);
            echo json_encode(["message" => "User ID is required"]);
        }
        break;

    case 'POST':
        // Handle POST requests (used for updating user information)
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['user_id']) && !empty($data)) {
            // Update user information
            $result = $user->updateUser((int)$data['user_id'], $data);
            if ($result) {
                // If update is successful, return a success message
                echo json_encode(["message" => "User updated successfully"]);
            } else {
                // If update fails, return a 400 error
                http_response_code(400);
                echo json_encode(["message" => "Unable to update user"]);
            }
        } else {
            // If required data is missing, return a 400 error
            http_response_code(400);
            echo json_encode(["message" => "User ID and data are required"]);
        }
        break;

    case 'PUT':
        // Handle PUT requests (used for updating profile picture)
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['user_id']) && isset($data['picture_url'])) {
            // Update user's profile picture
            $result = $user->updateProfilePicture((int)$data['user_id'], $data['picture_url']);
            if ($result) {
                // If update is successful, return a success message
                echo json_encode(["message" => "Profile picture updated successfully"]);
            } else {
                // If update fails, return a 400 error
                http_response_code(400);
                echo json_encode(["message" => "Unable to update profile picture"]);
            }
        } else {
            // If required data is missing, return a 400 error
            http_response_code(400);
            echo json_encode(["message" => "User ID and picture URL are required"]);
        }
        break;

    case 'DELETE':
        // Handle DELETE requests (not implemented)
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
        break;

    default:
        // If the HTTP method is not supported, return a 405 error
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
        break;
}
?>
