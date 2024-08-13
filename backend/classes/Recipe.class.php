<?php
/**
 * Recipe Class
 * 
 * This class is responsible for managing recipe-related data and operations within the application.
 * It provides methods to fetch recipe details from the MongoDB database, ensuring that data is 
 * properly sanitized before being used in the application. The class constructor requires a 
 * database connection object to perform queries.
 */

class Recipe {
    private $conn;
    private $collection_name = "recipes";

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Retrieves a recipe's information from the database based on its recipe ID.
     *
     * @param int $recipe_id The ID of the recipe to retrieve.
     * @return array|null The recipe document if found, null otherwise.
     */
    public function getRecipe($recipe_id) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $recipe = $collection->findOne(['recipe_id' => (int)$recipe_id]);
        return $recipe;
    }

    /**
     * Retrieves all recipes' information from the database.
     *
     * @return array The list of all recipe documents.
     */
    public function getAllRecipes() 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $recipes = $collection->find()->toArray();
        return $recipes;
    }

    /**
     * Creates a new recipe entry in the database.
     *
     * @param array $data The data of the recipe to be created.
     * @return array The inserted ID of the new recipe.
     */
    public function createRecipe($data) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $insertResult = $collection->insertOne($data);
        return ['inserted_id' => $insertResult->getInsertedId()];
    }

    /**
     * Updates a recipe's information in the database.
     *
     * @param int $recipe_id The ID of the recipe to update.
     * @param array $data The updated data of the recipe.
     * @return bool Returns true if the update was successful, false otherwise.
     */
    public function updateRecipe($recipe_id, $data) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $updateResult = $collection->updateOne(
            ['recipe_id' => (int)$recipe_id],
            ['$set' => $data]
        );
        return $updateResult->getModifiedCount() > 0;
    }

    /**
     * Deletes a recipe entry from the database.
     *
     * @param int $recipe_id The ID of the recipe to delete.
     * @return bool Returns true if the deletion was successful, false otherwise.
     */
    public function deleteRecipe($recipe_id) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $deleteResult = $collection->deleteOne(['recipe_id' => (int)$recipe_id]);
        return $deleteResult->getDeletedCount() > 0;
    }
}
?>
