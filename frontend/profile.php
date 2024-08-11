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
<!-- 
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

?> -->

 <?php include('header.php'); ?>

  <!-- Profile Page Content -->
  <main class="main-content" role="main">
    <section class="profile-section">
        <h1 class="brand">ShareABite</h1>

        <div class="profile-container">
          <div class="name-fields">
              <div class="name-field">
                  <label for="firstName">First Name:</label>
                  <div class="input-wrapper">
                      <input type="text" id="firstName" value="John" readonly>
                  </div>
              </div>
              <div class="name-field">
                  <label for="lastName">Last Name:</label>
                  <div class="input-wrapper">
                      <input type="text" id="lastName" value="Doe" readonly>
                  </div>
              </div>
          </div>

            <div class="user-picture">
                <!-- PHP would dynamically set the src attribute to user's picture -->
                <img src="../assets/images/default-profile.jpg" alt="User Picture" class="picture">
                <input type="file" id="pictureUpload" class="file-input" accept="image/*">
                <label for="pictureUpload" class="file-input-label hidden">Upload</label>
            </div>
        </div>

        <div class="manage-account">
            <h2>Manage Account:</h2>
            <ul class="manage-account-links">
                <li><a href="#" id="updateNameLink">Update Name</a></li>
                <li><a href="#" id="updatePictureLink">Update User Picture</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
            <button id="doneButton" class="hidden">Done</button>
            <button id="cancelButton" class="hidden">Cancel</button>
        </div>

        <div class="dietary-preferences">
            <h2>Dietary Preference(s):</h2>
            <div class="preferences-container">
                <label><input type="checkbox" name="preference" value="no_nuts"> No Nuts</label>
                <label><input type="checkbox" name="preference" value="lactose_intolerant"> Lactose Intolerant</label>
                <label><input type="checkbox" name="preference" value="keto_diet"> Keto Diet</label>
                <label><input type="checkbox" name="preference" value="vegan"> Vegan</label>
                <label><input type="checkbox" name="preference" value="gluten_free"> Gluten-Free</label>
                <label><input type="checkbox" name="preference" value="halal"> Halal Food</label>
            </div>
            <button id="updatePreferences" class="hidden">Update</button>
            <button id="cancelPreferences" class="hidden">Cancel</button>
        </div>
    </section>
</main>

 <!-- Footer Section -->
<?php
  include('footer.php');
?>


  <script src="./js/profile.js"></script>
</body>
</html>
