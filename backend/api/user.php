<?php
require_once '../classes/User.class.php';
require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $user->getUser($_GET['id']);
            $response = [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name
            ];
            echo json_encode($response);
        } else {
            // Here you can implement a method to get all users if needed.
            http_response_code(400);
            echo json_encode(["message" => "User ID is required"]);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $user->first_name = $data['firstName'];
        $user->last_name = $data['lastName'];
        $result = $user->updateUser((object)$data);
        if ($result) {
            echo json_encode(["message" => "User updated successfully"]);
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Unable to update user"]);
        }
        break;

    case 'PUT':
        // PUT can be used for profile picture update or other updates
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['user_id']) && isset($data['picture_url'])) {
            $result = $user->updateProfilePicture($data['user_id'], $data['picture_url']);
            if ($result) {
                echo json_encode(["message" => "Profile picture updated successfully"]);
            } else {
                http_response_code(400);
                echo json_encode(["message" => "Unable to update profile picture"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "User ID and picture URL are required"]);
        }
        break;

    case 'DELETE':
        // Implement delete functionality if needed
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
        break;
}
?>
