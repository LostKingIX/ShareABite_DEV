<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - ShareABite</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .contact-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .contact-form {
            flex: 1;
            margin-right: 20px;
        }
        .map-container {
            flex: 0 0 auto;
            width: 400px;
            height: 300px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .map-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .contact-actions {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <!-- Header placeholder -->
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
                        <img src="path_to_dc_map_screenshot.jpg" alt="Maps Screenshot of DC" class="map-image">
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

    <!-- Footer placeholder -->
    <footer class="footer">
        <!-- Footer content will be inserted here -->
    </footer>
</body>
</html>