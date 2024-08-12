<!-- // profile.php
/**
 * ShareABite - User Profile Page
 * 
 * This page displays and allows editing of user profile information.
 * It should include:
 * - Display of user details (name, email, dietary preferences, etc.)
 * - Option to update profile information
 * - Display of user's saved recipes and meal plans
 * - Option to change password
 */ -->

 <?php
  // Include database and user classes
  // include_once './backend/config/database.php';
  // include_once './backend/classes/User.class.php';

  // // Instantiate database and user objects
  // $database = new Database();
  // $db = $database->getConnection();

  // $user = new User($db);

  // // Get the user ID (this should be retrieved from session or request)
  // $user_id = 1; // Example user ID
  // $user->getUser($user_id);

?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShareABite - User Profile</title>
  <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
  <!-- Header Section -->
  <header class="header">
    <div class="header-container">
      <!-- Company Logo -->
      <img src="../assets/images/logo_test.jpg" alt="Company Logo" class="logo">
      <!-- Navigation Menu -->
      <nav class="nav">
        <a href="#" class="nav-item">Home</a> <!-- Home Link -->
        <a href="./profile.html" class="nav-item">Profile</a> <!-- Profile Link -->
        <a href="../index.html" class="brand">ShareABite</a> <!-- Company Name -->
        <a href="#" class="nav-item">Recipes</a> <!-- Recipes Link -->
        <a href="#" class="nav-item">Community</a> <!-- Community Link -->
        <a href="login_register.php" class="nav-item sign-in">Sign In / Register</a> <!-- Sign In/Register Button -->
      </nav>
    </div>
  </header>

  <!-- Profile Page Content -->
  <main class="main-content">
    <section class="profile-section">
      <h1 class="brand">ShareABite</h1>
      <div class="profile-container">
        <!-- User Name Fields -->
        <div class="name-fields">
          <label for="first-name">First Name:</label>
          <input type="text" id="first-name" class="user-name" value="<?php echo $firstName; ?>" readonly> <!-- PHP to dynamically display user's first name -->
          
          <label for="last-name">Last Name:</label>
          <input type="text" id="last-name" class="user-name" value="<?php echo $lastName; ?>" readonly> <!-- PHP to dynamically display user's last name -->
        </div>

        <!-- User Picture -->
        <div class="user-picture">
          <img src="<?php echo $user['picture']; ?>" alt="User Picture" class="picture"> <!-- PHP to dynamically display user's picture -->
          <button id="upload-btn" class="upload-btn hidden">Upload</button> <!-- Upload button initially hidden -->
        </div>
      </div>
      <!-- Manage Account Section -->
      <div class="manage-account">
        <p>Manage Account:</p>
        <ul>
          <li><a href="#" id="update-name-link">Update Name</a></li>
          <li><a href="#" id="update-picture-link">Update User Picture</a></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
        <button id="done-btn" class="hidden">Done</button> <!-- Done button initially hidden -->
        <button id="cancel-btn" class="hidden">Cancel</button> <!-- Cancel button initially hidden -->
      </div>

      <!-- Dietary Preferences Section -->
      <div class="dietary-preferences">
        <p>Dietary Preference(s):</p>
        <div class="preferences-container">
          <label><input type="checkbox" name="preference" value="no_nuts"> No Nuts</label>
          <label><input type="checkbox" name="preference" value="lactose_intolerant"> Lactose Intolerant</label>
          <label><input type="checkbox" name="preference" value="keto_diet"> Keto Diet</label>
          <label><input type="checkbox" name="preference" value="vegan"> Vegan</label>
          <label><input type="checkbox" name="preference" value="gluten_free"> Gluten-Free</label>
          <label><input type="checkbox" name="preference" value="halal_food"> Halal Food</label>
        </div>
        <button id="update-pref-btn" class="hidden">Update</button> <!-- Update button for preferences initially hidden -->
        <button id="cancel-pref-btn" class="hidden">Cancel</button> <!-- Cancel button for preferences initially hidden -->
      </div>
    </section>
  </main>

  <!-- Footer Section -->
  <footer class="footer">
    <div class="footer-container">

      <!-- Left Side of Footer: ShareABite Company Info -->
      <div class="footer-left">
        <img src="logo.png" alt="Company Logo" class="footer-logo">
        <p>ShareABite (c)</p>
        <p>About Us</p>
      </div>

      <!-- Center of Footer: Navigation Links -->
      <div class="footer-center">
        <ul class="footer-nav">
          <li><a href="#">Home</a></li>
          <li><a href="#">Recipes</a></li>
          <li><a href="#">Community</a></li>
        </ul>
      </div>

      <!-- Right Side of Footer: Legal Info -->
      <div class="footer-right">
        <ul class="legal-links">
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Use</a></li>
        </ul>
        <p>OOP 3 - Summer 2024</p>
      </div>
    </div>
  </footer>

  <script src="./js/profile.js"></script>
</body>
</html>
