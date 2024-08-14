<!-- // recipe_submission.php
/**
 * ShareABite - Recipe Submission Page
 * 
 * This page allows users to submit new recipes to ShareABite.
 * It should include:
 * - A form for entering recipe details (name, ingredients, instructions, etc.)
 * - Option to upload recipe images
 * - Input for nutritional information
 * - Tagging system for dietary categories
 */
 -->


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareABite - Recipe Submission</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .footer-logo {
            max-width: 150px;
        }
    </style>
</head>

  <!-- Header Section -->
  <?php include('header.php'); ?>
<body>
    <div class="container">
        <header class="bg-light py-3 text-center">
            <h1>Submit Your Recipe</h1>
        </header>
        
        <div class="recipe-submission-form my-4 p-3 border">
            <form action="submit_recipe.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="recipe_name">Recipe Name:</label>
                    <input type="text" class="form-control" id="recipe_name" name="recipe_name" required>
                </div>
                
                <div class="form-group">
                    <label for="ingredients">Ingredients (separate by commas):</label>
                    <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="instructions">Instructions:</label>
                    <textarea class="form-control" id="instructions" name="instructions" rows="5" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="recipe_image">Upload Recipe Image:</label>
                    <input type="file" class="form-control-file" id="recipe_image" name="recipe_image" accept="image/*">
                </div>
                
                <div class="form-group">
                    <label for="nutrition">Nutritional Information (e.g., Calories, Fat, Protein):</label>
                    <textarea class="form-control" id="nutrition" name="nutrition" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="tags">Dietary Categories (select all that apply):</label>
                    <select multiple class="form-control" id="tags" name="tags[]">
                        <option value="Vegetarian">Vegetarian</option>
                        <option value="Vegan">Vegan</option>
                        <option value="Gluten-Free">Gluten-Free</option>
                        <option value="Dairy-Free">Dairy-Free</option>
                        <option value="Nut-Free">Nut-Free</option>
                        <!-- Add more dietary categories as needed -->
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit Recipe</button>
            </form>
        </div>
    </div>
    
    <!-- Footer Section -->
    <?php include('footer.php'); ?>
