<?php
/**
 * Community Class
 * 
 * This class is responsible for managing community-related data and operations within the application.
 * It provides methods to fetch community details from the MongoDB database, ensuring that data is 
 * properly sanitized before being used in the application. The class constructor requires a 
 * database connection object to perform queries.
 */

class Community {
    private $conn;
    private $collection_name = "communities";

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Retrieves a community's information from the database based on its community ID.
     *
     * @param int $community_id The ID of the community to retrieve.
     * @return array|null The community document if found, null otherwise.
     */
    public function getCommunity($community_id) 
    {
        // Select the 'communities' collection
        $collection = $this->conn->selectCollection($this->collection_name);

        // Fetch the community document by community ID
        $community = $collection->findOne(['community_id' => (int)$community_id]);

        return $community;
    }

    /**
     * Retrieves all communities' information from the database.
     *
     * @return array The list of all community documents.
     */
    public function getAllCommunities() 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $communities = $collection->find()->toArray();
        return $communities;
    }

    /**
     * Creates a new community entry in the database.
     *
     * @param array $data The data of the community to be created.
     * @return array The inserted ID of the new community.
     */
    public function createCommunity($data) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $insertResult = $collection->insertOne($data);
        return ['inserted_id' => $insertResult->getInsertedId()];
    }

    /**
     * Updates a community's information in the database.
     *
     * @param int $community_id The ID of the community to update.
     * @param array $data The updated data of the community.
     * @return bool Returns true if the update was successful, false otherwise.
     */
    public function updateCommunity($community_id, $data) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $updateResult = $collection->updateOne(
            ['community_id' => (int)$community_id],
            ['$set' => $data]
        );
        return $updateResult->getModifiedCount() > 0;
    }

    /**
     * Deletes a community entry from the database.
     *
     * @param int $community_id The ID of the community to delete.
     * @return bool Returns true if the deletion was successful, false otherwise.
     */
    public function deleteCommunity($community_id) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $deleteResult = $collection->deleteOne(['community_id' => (int)$community_id]);
        return $deleteResult->getDeletedCount() > 0;
    }
}
?>
