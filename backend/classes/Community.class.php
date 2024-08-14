<?php
/**
 * Community Class
 * 
 * This class is responsible for managing community-related data and operations within the application.
 * It provides methods to fetch, create, update, and delete community posts from the MongoDB database.
 */


 // this the constructor for the community class 
class Community {
    private $conn;
    private $collection_name = "community_posts";

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Retrieves a community post's information from the database based on its post ID.
     *
     * @param int $post_id The ID of the post to retrieve.
     * @return array|null The community post document if found, null otherwise.
     */
    public function getPost($post_id) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $post = $collection->findOne(['post_id' => (int)$post_id]);
        return $post;
    }

    /**
     * Retrieves all community posts from the database.
     *
     * @return array The list of all community post documents.
     */
    public function getAllPosts() 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $posts = $collection->find()->toArray();
        return $posts;
    }

    /**
     * Creates a new community post in the database.
     *
     * @param array $data The data of the post to be created.
     * @return array The inserted ID of the new post.
     */
    public function createPost($data) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $insertResult = $collection->insertOne($data);
        return ['inserted_id' => $insertResult->getInsertedId()];
    }

    /**
     * Updates a community post's information in the database.
     *
     * @param int $post_id The ID of the post to update.
     * @param array $data The updated data of the post.
     * @return bool Returns true if the update was successful, false otherwise.
     */
    public function updatePost($post_id, $data) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $updateResult = $collection->updateOne(
            ['post_id' => (int)$post_id],
            ['$set' => $data]
        );
        return $updateResult->getModifiedCount() > 0;
    }

    /**
     * Deletes a community post. 
     *
     * @param int $post_id The ID of the post to delete.
     * @return bool Returns true if the deletion was successful, false otherwise.
     */
    public function deletePost($post_id) 
    {
        $collection = $this->conn->selectCollection($this->collection_name);
        $deleteResult = $collection->deleteOne(['post_id' => (int)$post_id]);
        return $deleteResult->getDeletedCount() > 0;
    }
}
?>
