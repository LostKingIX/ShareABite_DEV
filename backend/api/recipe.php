<?php
require_once '../classes/Recipe.class.php';
require_once '../config/database.php';

// Initialize the Database and Recipe classes
$database = new Database();
$db = $database->getMongoConnection(); // Use getMongoConnection() to connect to MongoDB

$recipe = new Recipe($db);

// Determine the HTTP request method
$method = $_SERVER['REQUEST_METHOD'];

// Handle the request based on the HTTP method
switch ($method) {
    case 'GET':
        // Handle GET requests
        if (isset($_GET['id'])) {
            // Fetch recipe data by ID
            $recipeData = $recipe->getRecipe((int)$_GET['id']); // Cast id to int
            if ($recipeData) {
                // If recipe is found, return its data as JSON
                echo json_encode($recipeData);
            } else {
                // If recipe is not found, return a 404 error
                http_response_code(404);
                echo json_encode(["message" => "Recipe not found"]);
            }
        } else {
            // If no ID is provided, return all recipes
            echo json_encode($recipe->getAllRecipes());
        }
        break;

    case 'POST':
        // Handle POST requests (used for creating a new recipe)
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $recipe->createRecipe($data);
        echo json_encode($result);
        break;

    case 'PUT':
        // Handle PUT requests (used for updating a recipe)
        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $recipe->updateRecipe((int)$_GET['id'], $data); // Cast id to int
            if ($result) {
                // If update is successful, return a success message
                echo json_encode(["message" => "Recipe updated successfully"]);
            } else {
                // If update fails, return a 400 error
                http_response_code(400);
                echo json_encode(["message" => "Unable to update recipe"]);
            }
        } else {
            // If no ID is provided, return a 400 error
            http_response_code(400);
            echo json_encode(["message" => "Recipe ID is required"]);
        }
        break;

    case 'DELETE':
        // Handle DELETE requests (used for deleting a recipe)
        if (isset($_GET['id'])) {
            $result = $recipe->deleteRecipe((int)$_GET['id']); // Cast id to int
            if ($result) {
                // If deletion is successful, return a success message
                echo json_encode(["message" => "Recipe deleted successfully"]);
            } else {
                // If deletion fails, return a 400 error
                http_response_code(400);
                echo json_encode(["message" => "Unable to delete recipe"]);
            }
        } else {
            // If no ID is provided, return a 400 error
            http_response_code(400);
            echo json_encode(["message" => "Recipe ID is required"]);
        }
        break;

    default:
        // If the HTTP method is not supported, return a 405 error
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
        break;
}
?>
