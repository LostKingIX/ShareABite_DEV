<?php
require_once '../classes/Community.class.php';
require_once '../config/database.php';

// Initialize the Database and Community classes
$database = new Database();
$db = $database->getMongoConnection(); // Use getMongoConnection() to connect to MongoDB

$community = new Community($db);

// Determine the HTTP request method
$method = $_SERVER['REQUEST_METHOD'];

// Handle the request based on the HTTP method
switch ($method) {
    case 'GET':
        // Handle GET requests
        if (isset($_GET['id'])) {
            // Fetch community data by ID
            $communityData = $community->getPost((int)$_GET['id']); // Cast id to int
            if ($communityData) {
                // If community post is found, return its data as JSON
                echo json_encode($communityData);
            } else {
                // If community post is not found, return a 404 error
                http_response_code(404);
                echo json_encode(["message" => "Community not found"]);
            }
        } else {
            // If no ID is provided, return all community posts
            echo json_encode($community->getAllPosts());
        }
        break;

    case 'POST':
        // Handle POST requests (used for creating a new community post)
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $community->createPost($data);
        echo json_encode($result);
        break;

    case 'PUT':
        // Handle PUT requests (used for updating a community post)
        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $community->updatePost((int)$_GET['id'], $data); // Cast id to int
            if ($result) {
                // If update is successful, return a success message
                echo json_encode(["message" => "Community updated successfully"]);
            } else {
                // If update fails, return a 400 error
                http_response_code(400);
                echo json_encode(["message" => "Unable to update community"]);
            }
        } else {
            // If no ID is provided, return a 400 error
            http_response_code(400);
            echo json_encode(["message" => "Community ID is required"]);
        }
        break;

    case 'DELETE':
        // Handle DELETE requests (used for deleting a community post)
        if (isset($_GET['id'])) {
            $result = $community->deletePost((int)$_GET['id']); // Cast id to int
            if ($result) {
                // If deletion is successful, return a success message
                echo json_encode(["message" => "Community deleted successfully"]);
            } else {
                // If deletion fails, return a 400 error
                http_response_code(400);
                echo json_encode(["message" => "Unable to delete community"]);
            }
        } else {
            // If no ID is provided, return a 400 error
            http_response_code(400);
            echo json_encode(["message" => "Community ID is required"]);
        }
        break;

    default:
        // If the HTTP method is not supported, return a 405 error
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
        break;
}
?>
