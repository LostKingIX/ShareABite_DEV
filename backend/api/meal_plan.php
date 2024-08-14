<?php
require_once '../classes/MealPlan.class.php';
require_once '../config/database.php';

// Initialize the Database and MealPlan classes
$database = new Database();
$db = $database->getMongoConnection(); // Use getMongoConnection() to connect to MongoDB

$mealPlan = new MealPlan($db);

// Determine the HTTP request method
$method = $_SERVER['REQUEST_METHOD'];

// Handle the request based on the HTTP method
switch ($method) {
    case 'GET':
        // Handle GET requests
        if (isset($_GET['id'])) {
            // Fetch meal plan data by ID
            $mealPlanData = $mealPlan->getMealPlan((int)$_GET['id']); // Cast id to int
            if ($mealPlanData) {
                // If meal plan is found, return its data as JSON
                echo json_encode($mealPlanData);
            } else {
                // If meal plan is not found, return a 404 error
                http_response_code(404);
                echo json_encode(["message" => "Meal Plan not found"]);
            }
        } else {
            // If no ID is provided, return all meal plans
            echo json_encode($mealPlan->getAllMealPlans());
        }
        break;

    case 'POST':
        // Handle POST requests (used for creating a new meal plan)
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $mealPlan->createMealPlan($data);
        echo json_encode($result);
        break;

    case 'PUT':
        // Handle PUT requests (used for updating a meal plan)
        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $mealPlan->updateMealPlan((int)$_GET['id'], $data); // Cast id to int
            if ($result) {
                // If update is successful, return a success message
                echo json_encode(["message" => "Meal Plan updated successfully"]);
            } else {
                // If update fails, return a 400 error
                http_response_code(400);
                echo json_encode(["message" => "Unable to update Meal Plan"]);
            }
        } else {
            // If no ID is provided, return a 400 error
            http_response_code(400);
            echo json_encode(["message" => "Meal Plan ID is required"]);
        }
        break;

    case 'DELETE':
        // Handle DELETE requests (used for deleting a meal plan)
        if (isset($_GET['id'])) {
            $result = $mealPlan->deleteMealPlan((int)$_GET['id']); // Cast id to int
            if ($result) {
                // If deletion is successful, return a success message
                echo json_encode(["message" => "Meal Plan deleted successfully"]);
            } else {
                // If deletion fails, return a 400 error
                http_response_code(400);
                echo json_encode(["message" => "Unable to delete Meal Plan"]);
            }
        } else {
            // If no ID is provided, return a 400 error
            http_response_code(400);
            echo json_encode(["message" => "Meal Plan ID is required"]);
        }
        break;

    default:
        // If the HTTP method is not supported, return a 405 error
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
        break;
}
?>
