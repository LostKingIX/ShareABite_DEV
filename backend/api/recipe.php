<?php
require_once '../classes/Recipe.class.php';
require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$recipe = new Recipe($db);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $recipeData = $recipe->getRecipe((int)$_GET['id']); // Cast id to int
            if ($recipeData) {
                echo json_encode($recipeData);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Recipe not found"]);
            }
        } else {
            echo json_encode($recipe->getAllRecipes());
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $recipe->createRecipe($data);
        echo json_encode($result);
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $recipe->updateRecipe((int)$_GET['id'], $data); // Cast id to int
            if ($result) {
                echo json_encode(["message" => "Recipe updated successfully"]);
            } else {
                http_response_code(400);
                echo json_encode(["message" => "Unable to update recipe"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Recipe ID is required"]);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            $result = $recipe->deleteRecipe((int)$_GET['id']); // Cast id to int
            if ($result) {
                echo json_encode(["message" => "Recipe deleted successfully"]);
            } else {
                http_response_code(400);
                echo json_encode(["message" => "Unable to delete recipe"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Recipe ID is required"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
        break;
}
?>
