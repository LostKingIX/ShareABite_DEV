<!-- // login.php
/**
 * ShareABite - User Login Page
 * 
 * This page manages user authentication for ShareABite.
 * It should include:
 * - A login form (email/username and password)
 * - 'Forgot Password' functionality
 * - Error handling for incorrect credentials
 * - Redirection to user dashboard upon successful login
 */ -->

  <!-- Header Section -->

<?php include('header.php'); ?>

 <?php
// Start session
session_start();

// Include database connection
include('../backend/config/database.php');

// Initialize variables
$login_error = '';
$register_error = '';
$register_success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        // Handle login
        $email = $_POST['login_email'];
        $password = $_POST['login_password'];

        // Verify reCAPTCHA
        $recaptchaSecret = 'YOUR_SECRET_KEY'; // Replace with your reCAPTCHA secret key
        $recaptchaResponse = $_POST['g-recaptcha-response'];
        $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecret}&response={$recaptchaResponse}");
        $responseData = json_decode($verifyResponse);

        if ($responseData->success) {
            // Prepare SQL statement
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    // Successful login
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    header("Location: profile.php");  // Redirect to profile page after successful login
                    exit();
                } else {
                    $login_error = "Incorrect password!";
                }
            } else {
                $login_error = "Email not found in our database!";
            }
        } else {
            $login_error = "reCAPTCHA verification failed. Please try again.";
        }
    } elseif (isset($_POST['register'])) {
        // Handle registration
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['register_email'];
        $password = $_POST['register_password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($password !== $confirmPassword) {
            $register_error = "Passwords do not match!";
        } else {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            if ($stmt->rowCount() > 0) {
                $register_error = "Email already exists!";
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                // Prepare SQL statement for insertion
                $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)");
                $stmt->execute([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $email,
                    'password' => $hashedPassword
                ]);
                $register_success = "Registration successful! You can now log in.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login & Register - ShareABite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }
    </style>
    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.getElementById('login-section').classList.remove('active');
            document.getElementById('register-section').classList.remove('active');
            
            // Show the selected section
            document.getElementById(sectionId).classList.add('active');
        }

        // By default, show the login section
        window.onload = function() {
            showSection('login-section');
        };
    </script>
</head>
<body >
    <div class="container mt-5">
        <h2 class="text-center">Begin your journey with ShareABite</h2>

        <!-- Login Form Section -->
        <div id="login-section" class="form-section active">
            <h3 class="text-center">Login</h3>
            <form action="login_register.php" method="post" class="mx-auto" style="max-width: 400px;">
                <div class="mb-3">
                    <label for="login_email" class="form-label">Email:</label>
                    <input type="email" name="login_email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="login_password" class="form-label">Password:</label>
                    <input type="password" name="login_password" class="form-control" required>
                </div>

                <?php if ($login_error) { echo "<p class='text-danger'>$login_error</p>"; } ?>

                <div class="d-grid gap-2">
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='google_login.php'">Login with Google</button>
                </div>
                <div class="mt-3 text-center">
                    <a href="forgot_password.php">Forgot password?</a><br>
                    <button type="button" class="btn btn-link" onclick="showSection('register-section')">Register</button>
                </div>
            </form>
        </div>

        <!-- Registration Form Section -->
        <div id="register-section" class="form-section">
            <h3 class="text-center">Register</h3>
            <form action="login_register.php" method="post" class="mx-auto" style="max-width: 400px;">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name:</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="register_email" class="form-label">Email:</label>
                    <input type="email" name="register_email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="register_password" class="form-label">Password:</label>
                    <input type="password" name="register_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>

                <?php
                if ($register_error) { echo "<p class='text-danger'>$register_error</p>"; }
                if ($register_success) { echo "<p class='text-success'>$register_success</p>"; }
                ?>

                <div class="d-grid gap-2">
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                    <button type="button" class="btn btn-link" onclick="showSection('login-section')">Back to Login</button>
                </div>
            </form>
        </div>
    </div>

<!-- Footer Section -->
<?php include('footer.php'); ?>
