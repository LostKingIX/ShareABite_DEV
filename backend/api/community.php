<?php
require_once '../classes/Community.class.php';
require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$community = new Community($db);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $communityData = $community->getCommunity((int)$_GET['id']); // Cast id to int
            if ($communityData) {
                echo json_encode($communityData);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Community not found"]);
            }
        } else {
            echo json_encode($community->getAllCommunities());
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $community->createCommunity($data);
        echo json_encode($result);
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $community->updateCommunity((int)$_GET['id'], $data); // Cast id to int
            if ($result) {
                echo json_encode(["message" => "Community updated successfully"]);
            } else {
                http_response_code(400);
                echo json_encode(["message" => "Unable to update community"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Community ID is required"]);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            $result = $community->deleteCommunity((int)$_GET['id']); // Cast id to int
            if ($result) {
                echo json_encode(["message" => "Community deleted successfully"]);
            } else {
                http_response_code(400);
                echo json_encode(["message" => "Unable to delete community"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Community ID is required"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
        break;
}
?>
