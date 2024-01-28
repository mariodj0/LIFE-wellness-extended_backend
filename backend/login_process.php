<?php
// Start a session.
session_start();

// Include the database access script.
require_once 'db_access.php';

// Function to sanitize user input for security.
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Initialize arrays to store login errors and user inputs.
$_SESSION['login_errors'] = [];
$_SESSION['login_input'] = [];

// Check if the form is submitted.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitizeInput($_POST['email'] ?? '');
    $password = sanitizeInput($_POST['password'] ?? '');

    // Store user inputs in session for reuse in case of errors.
    $_SESSION['login_input']['email'] = $email;
    $_SESSION['login_input']['password'] = $password;

    // Validate email and password.
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['login_errors']['email'] = 'Please enter a valid email address.';
    }
    if (empty($password)) {
        $_SESSION['login_errors']['password'] = 'Please enter your password.';
    }

    // If no validation errors, proceed with user authentication.
    if (empty($_SESSION['login_errors'])) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM `user` WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if user exists and password matches.
            if ($user && $password === $user['password']) {
                // Set session variables for the logged-in user.
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['first_name'];
                $_SESSION['user_last_name'] = $user['last_name'];
                $_SESSION['user_age'] = $user['age'];
                $_SESSION['user_phone'] = $user['phone'];
                $_SESSION['user_student'] = $user['is_student'];
                $_SESSION['user_employed'] = $user['is_employed'];

                // Redirect to myServices page after successful login.
                header('Location: /~s3917002/wp/a2/myServices.php');
                exit();
            } else {
                // If credentials are incorrect, set an error message.
                $_SESSION['login_errors']['login'] = 'Invalid email or password. Please try again.';
                header('Location: /~s3917002/wp/a2/login.php');
                exit();
            }
        } catch (PDOException $e) {
            // Handle any PDO exceptions during database interaction.
            $_SESSION['login_errors']['database'] = 'Database error: ' . $e->getMessage();
            header('Location: /~s3917002/wp/a2/login.php');
            exit();
        }
    } else {
        // If there are input errors, redirect back to the login page with errors.
        header('Location: /~s3917002/wp/a2/login.php');
        exit();
    }
}
?>
