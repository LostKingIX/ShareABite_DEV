<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareABite - Recipe List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .recipe-thumbnail {
            max-width: 100%;
            height: auto;
        }
        .recipe-card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="bg-light py-3 text-center">
            <h1>Recipe List</h1>
        </header>

        <!-- Search and Filter Section -->
        <div class="search-filter my-4">
            <form action="" method="GET" class="form-inline">
                <input type="text" class="form-control mb-2 mr-sm-2" name="search" placeholder="Search recipes..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

                <select class="form-control mb-2 mr-sm-2" name="filter" onchange="this.form.submit()">
                    <option value="">Filter by Category</option>
                    <option value="Vegetarian" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'Vegetarian') echo 'selected'; ?>>Vegetarian</option>
                    <option value="Vegan" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'Vegan') echo 'selected'; ?>>Vegan</option>
                    <option value="Gluten-Free" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'Gluten-Free') echo 'selected'; ?>>Gluten-Free</option>
                    <option value="Dairy-Free" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'Dairy-Free') echo 'selected'; ?>>Dairy-Free</option>
                    <option value="Nut-Free" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'Nut-Free') echo 'selected'; ?>>Nut-Free</option>
                    <!-- Add more filter options as needed -->
                </select>

                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </form>
        </div>

        <!-- Sorting Options -->
        <div class="sorting-options my-4">
            <form action="" method="GET" class="form-inline">
                <label for="sort" class="mr-2">Sort by:</label>
                <select class="form-control" name="sort" id="sort" onchange="this.form.submit()">
                    <option value="popularity" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'popularity') echo 'selected'; ?>>Popularity</option>
                    <option value="date_added" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'date_added') echo 'selected'; ?>>Date Added</option>
                    <!-- Add more sorting options as needed -->
                </select>
            </form>
        </div>

        <!-- Recipe List Section -->
        <div class="row">
            <?php
            // Example PHP logic to fetch and display recipes (replace with actual data fetching logic)
            $recipes = [
                ['id' => 1, 'title' => 'Spaghetti Bolognese', 'image' => 'spaghetti.jpg', 'description' => 'A classic Italian pasta dish with rich meat sauce.'],
                ['id' => 2, 'title' => 'Chicken Curry', 'image' => 'chicken_curry.jpg', 'description' => 'A spicy and flavorful chicken dish with Indian spices.'],
                ['id' => 3, 'title' => 'Vegetable Stir Fry', 'image' => 'stir_fry.jpg', 'description' => 'A healthy and colorful mix of vegetables stir-fried in a savory sauce.']
                // Add more recipes as needed
            ];

            foreach ($recipes as $recipe) {
                echo '
                <div class="col-md-4">
                    <div class="card recipe-card">
                        <img src="' . $recipe['image'] . '" class="card-img-top recipe-thumbnail" alt="' . $recipe['title'] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $recipe['title'] . '</h5>
                            <p class="card-text">' . $recipe['description'] . '</p>
                            <a href="recipe_detail.php?id=' . $recipe['id'] . '" class="btn btn-primary">View Recipe</a>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>

        <!-- Pagination Section (if applicable) -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center my-4">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
    
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
