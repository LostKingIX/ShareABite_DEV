<?php
/**
 * MealPlan Class
 * 
 * This class is responsible for managing meal plan-related data and operations within the application.
 * It provides methods to fetch meal plan details from the MongoDB database, ensuring that data is 
 * properly sanitized before being used in the application. The class constructor requires a 
 * database connection object to perform queries.
 */

class MealPlan {
    private $conn;
    private $collection_name = "meal_plans";

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Retrieves a meal plan's information from the database based on its meal plan ID.
     *
     * @param int $meal_plan_id The ID of the meal plan to retrieve.
     * @return array|null The meal plan document if found, null otherwise.
     */
    public function getMealPlan($meal_plan_id) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $mealPlan = $collection->findOne(['meal_plan_id' => (int)$meal_plan_id]);
        return $mealPlan;
    }

    /**
     * Retrieves all meal plans' information from the database.
     *
     * @return array The list of all meal plan documents.
     */
    public function getAllMealPlans() 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $mealPlans = $collection->find()->toArray();
        return $mealPlans;
    }

    /**
     * Creates a new meal plan entry in the database.
     *
     * @param array $data The data of the meal plan to be created.
     * @return array The inserted ID of the new meal plan.
     */
    public function createMealPlan($data) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $insertResult = $collection->insertOne($data);
        return ['inserted_id' => $insertResult->getInsertedId()];
    }

    /**
     * Updates a meal plan's information in the database.
     *
     * @param int $meal_plan_id The ID of the meal plan to update.
     * @param array $data The updated data of the meal plan.
     * @return bool Returns true if the update was successful, false otherwise.
     */
    public function updateMealPlan($meal_plan_id, $data) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $updateResult = $collection->updateOne(
            ['meal_plan_id' => (int)$meal_plan_id],
            ['$set' => $data]
        );
        return $updateResult->getModifiedCount() > 0;
    }

    /**
     * Deletes a meal plan entry from the database.
     *
     * @param int $meal_plan_id The ID of the meal plan to delete.
     * @return bool Returns true if the deletion was successful, false otherwise.
     */
    public function deleteMealPlan($meal_plan_id) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $deleteResult = $collection->deleteOne(['meal_plan_id' => (int)$meal_plan_id]);
        return $deleteResult->getDeletedCount() > 0;
    }
}
?>
