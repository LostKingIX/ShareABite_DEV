<!-- /**
 * ShareABite - Home Page
 * 
 * This is the main landing page for the ShareABite application.
 * It should display:
 * - An introduction to ShareABite's features
 * - Featured recipes or popular meal plans
 * - Quick links to recipe search, meal planning, and community features
 * - Call-to-action for user registration or login
 */ -->

 <!-- Header Section -->
<?php include('./frontend/header.php'); ?>
 
  <!-- Main Content Section -->
  <main class="main-content">
    <!-- Intro Section with Hook -->
    <section class="intro-section">
      <div class="intro-container">
        <!-- Placeholder for Company Image -->
        <div class="company-image"></div>
        <!-- Introductory Text -->
        <div class="intro-text">
          <h1>Hmm... Thinking of what to eat?</h1>
          <p>Ready for a culinary adventure? Discover delightful recipes that will make your taste buds dance! Whether it's sweet, savory, or something new, there's a delicious find waiting for you. Scroll down and let's get cooking!</p>
        </div>
      </div>
      <!-- Scroll Indicator -->
      <div class="scroll-indicator">
        <p>⬇️</p>
      </div>
    </section>

    <!-- Feedback Section -->
    <section class="feedback-section">
      <div class="feedback-container">
        <!-- Feedback from User 1 -->
        <div class="feedback">
          <div class="avatar"></div>
          <p class="comment">"Finding a recipe has never been this exciting! I discovered a new favorite dish that my whole family loves."</p>
          <p class="user">User 1</p>
        </div>
        <!-- Feedback from User 2 -->
        <div class="feedback">
          <div class="avatar"></div>
          <p class="comment">"Not sure what I was expecting... but every recipe I've tried has been a hit. Cooking has never been so fun!"</p>
          <p class="user">User 2</p>
        </div>
        <!-- Feedback from User 3 -->
        <div class="feedback">
          <div class="avatar"></div>
          <p class="comment">"I'm constantly amazed by the variety of recipes here. It's like having a world of flavors at my fingertips. Yum!"</p>
          <p class="user">User 3</p>
        </div>
      </div>
    </section>
  </main>

<!-- Footer Section -->
<?php include('./frontend/footer.php'); ?>