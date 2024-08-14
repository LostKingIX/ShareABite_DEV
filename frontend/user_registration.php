// user_registration.php
/**
 * ShareABite - User Registration Page
 * 
 * This page handles new user registration for ShareABite.
 * It should include:
 * - A form for users to enter their details (name, email, password, etc.)
 * - Options for selecting dietary preferences
 * - Client-side form validation
 * - Submission handling and account creation logic
 */
<?php
// Start session
session_start();

// Include database connection
require_once('database.php');

// Initialize Database class and establish a MySQL connection
$database = new Database();
$mysqlDb = $database->getMysqlConnection();

// Initialize variables
$register_error = '';
$register_success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $register_error = "Passwords do not match!";
    } else {
        $stmt = $mysqlDb->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        if ($stmt->rowCount() > 0) {
            $register_error = "Email already exists!";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Prepare SQL statement for insertion
            $stmt = $mysqlDb->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)");
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration - ShareABite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Register for ShareABite</h2>
        <form action="user_registration.php" method="post" class="mx-auto" style="max-width: 400px;">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" required>
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
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
