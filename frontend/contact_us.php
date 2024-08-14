// contact.php
/**
 * ShareABite - Contact Page
 * 
 * This page allows users to get in touch with ShareABite support.
 * It should include:
 * - Contact form for user inquiries
 * - Display of other contact methods (email, phone, etc.)
 * - FAQ section to address common questions
 */

 <!-- Header Section -->
 <?php include('header.php'); ?>

include('contact-form.php');

<!-- Main Content Section -->
<div class="main-content">
        <div class="intro-container">
            <div class="contact-info">
                <div class="contact-item">
                    <span> Phone Number:</span><br>
                    <input type="text" value="(123)-456-7890" disabled>
                </div>
                <div class="contact-item">
                    <span> Email Address:</span><br>
                    <input type="email" value="email@address.com" disabled>
                </div>
            </div>
            <div class="map-section">
                <img src="map-screenshot.png" alt="Maps Screenshot of DC" class="company-image">
            </div>
        </div>
        <div class="button-section">
            <a href="mailto:email@address.com" class="email-button">Email Us!</a>
        </div>
    </div>

    <!-- Contact the Team Section -->
    <div class="footer">
        <div class="footer-container">
            <div class="footer-left">
                <h3>Contact the Team</h3>
                <div class="team-member">
                    <p>Kuldeep Mohanta</p>
                    <a href="mailto:kuldeep.mohanta@dcmail.ca">kuldeep.mohanta@dcmail.ca</a>
                </div>
                <div class="team-member">
                    <p>Princess</p>
                    <a href="mailto:princess.emmanuel@dcmail.ca">princess.emmanuel@dcmail.ca</a>
                </div>
                <div class="team-member">
                    <p>James</p>
                    <a href="mailto:asdf@gmail.com">asdf@gmail.com</a>
                </div>
                <div class="team-member">
                    <p>Bharat Gahlot</p>
                    <a href="mailto:asdf@gmail.com">asdf@gmail.com</a>
                </div>
                <div class="team-member">
                    <p>Arsh</p>
                    <a href="mailto:asdf@gmail.com">asdf@gmail.com</a>
                </div>
            </div>





include('footer.php');