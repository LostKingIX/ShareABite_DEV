<!-- // community.php
/**
 * ShareABite - Community Page
 * 
 * This page facilitates community interaction within ShareABite.
 * It should include:
 * - User-generated content (recipes, meal plans, tips)
 * - Discussion forums or comment sections
 * - Featured community members or top contributors
 * - Recent activity feed
 */ -->

 <!-- //community php
/**
 * ShareABite - Community Page
 * 
 * This page facilitates community interaction within ShareABite.
 * It includes:
 * - User-generated content (recipes, meal plans, tips)
 * - Dropdown menus for different categories
 * - Randomly generated "Recipe of the Day"
 * - A section for different types of food (African, Halal, Fast Food, etc.)
 * - Footer with basic links and credits
 */ -->

 <!-- Header Section -->
 <?php include('header.php'); ?>

<!-- Main Content Section -->
<div class="main-content">
    <!-- Recipe of the Day Section -->
    <div class="recipe-day">
        <h2>Recipe of the Day</h2>
        <p>Randomly generated: <strong>Spaghetti Bolognese</strong></p>
    </div>

    <!-- Categories Section -->
    <div class="categories">
        <div class="category">
            <label for="african-dropdown">African</label><br>
            <select id="african-dropdown">
                <option value="jollof-rice">Jollof Rice</option>
                <option value="injera">Injera</option>
                <option value="pounded-yam">Pounded Yam</option>
            </select>
        </div>
        <div class="category">
            <label for="halal-dropdown">Halal</label><br>
            <select id="halal-dropdown">
                <option value="shawarma">Shawarma</option>
                <option value="biriyani">Biriyani</option>
                <option value="falafel">Falafel</option>
            </select>
        </div>
        <div class="category">
            <label for="fastfood-dropdown">Fast Food</label><br>
            <select id="fastfood-dropdown">
                <option value="burger">Burger</option>
                <option value="fries">Fries</option>
                <option value="pizza">Pizza</option>
            </select>
        </div>
        <div class="category">
            <label for="breakfast-dropdown">Breakfast</label><br>
            <select id="breakfast-dropdown">
                <option value="pancakes">Pancakes</option>
                <option value="eggs-benedict">Eggs Benedict</option>
                <option value="smoothie-bowl">Smoothie Bowl</option>
            </select>
        </div>
        <div class="category">
            <label for="dessert-dropdown">Dessert</label><br>
            <select id="dessert-dropdown">
                <option value="cheesecake">Cheesecake</option>
                <option value="brownies">Brownies</option>
                <option value="ice-cream">Ice Cream</option>
            </select>
        </div>
        <div class="category">
            <label for="chinese-dropdown">Chinese</label><br>
            <select id="chinese-dropdown">
                <option value="dim-sum">Dim Sum</option>
                <option value="kung-pao-chicken">Kung Pao Chicken</option>
                <option value="sweet-sour-pork">Sweet & Sour Pork</option>
            </select>
        </div>
    </div>
</div>

<!-- Footer Section -->
<?php 
// Include the Footer
include('footer.php'); 
?>