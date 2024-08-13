<?php
require_once '../classes/MealPlan.class.php';
require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$mealPlan = new MealPlan($db);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $mealPlanData = $mealPlan->getMealPlan((int)$_GET['id']); // Cast id to int
            if ($mealPlanData) {
                echo json_encode($mealPlanData);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Meal Plan not found"]);
            }
        } else {
            echo json_encode($mealPlan->getAllMealPlans());
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $mealPlan->createMealPlan($data);
        echo json_encode($result);
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $mealPlan->updateMealPlan((int)$_GET['id'], $data); // Cast id to int
            if ($result) {
                echo json_encode(["message" => "Meal Plan updated successfully"]);
            } else {
                http_response_code(400);
                echo json_encode(["message" => "Unable to update Meal Plan"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Meal Plan ID is required"]);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            $result = $mealPlan->deleteMealPlan((int)$_GET['id']); // Cast id to int
            if ($result) {
                echo json_encode(["message" => "Meal Plan deleted successfully"]);
            } else {
                http_response_code(400);
                echo json_encode(["message" => "Unable to delete Meal Plan"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Meal Plan ID is required"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
        break;
}
?>
