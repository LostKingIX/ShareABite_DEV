<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - ShareABite</title>
    <link rel="stylesheet" href="../frontend/css/styles.css">
    
</head>
<body>
     <!-- Header Section -->
    <?php include('header.php'); ?>
    <header class="header">
        <!-- Header content will be inserted here -->
    </header>

    <main class="main-content">
        <section class="contact-section">
            <div class="contact-container">
                <div class="contact-form">
                    <div class="contact-field">
                        <label for="phone">Phone Number:</label>
                        <div class="input-wrapper">
                            <input type="tel" id="phone" name="phone" placeholder="(123)-456-7890">
                        </div>
                    </div>
                    <div class="contact-field">
                        <label for="email">Email Address:</label>
                        <div class="input-wrapper">
                            <input type="email" id="email" name="email" placeholder="email@address.com">
                        </div>
                    </div>
                </div>
                <div class="map-container">
                    <a href="https://www.google.ca/maps/place/Durham+College/@43.9435225,-78.8960525,16.31z/data=!4m6!3m5!1s0x89d51b902fedb973:0xdd6091694035e8a1!8m2!3d43.9436083!4d-78.8969884!16s%2Fg%2F113dxbqxk?entry=ttu" target="_blank" rel="noopener noreferrer">
                        <img src="../assets/images/college_map.png" alt="Maps Screenshot of DC" class="map-image">
                    </a>
                </div>
            </div>
            <div class="contact-actions">
                <button class="contact-button">Button →</button>
                <button class="email-us-button">Email Us!</button>
            </div>
        </section>

        <!-- Rest of the HTML remains the same -->

    </main>

    <!-- Footer Section -->
    <?php include('footer.php'); ?>

    <footer class="footer">
        <!-- Footer content will be inserted here -->
    </footer>
</body>
</html>