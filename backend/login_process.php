<?php
session_start();
require_once 'db_access.php';

// Function to sanitize user input
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Initialize error array
$_SESSION['login_errors'] = [];
$_SESSION['login_input'] = []; // To store user input in case of errors

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitizeInput($_POST['email'] ?? '');
    $password = sanitizeInput($_POST['password'] ?? '');

    // Store user input in session
    $_SESSION['login_input']['email'] = $email;
    $_SESSION['login_input']['password'] = $password;

    // Validate input
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['login_errors']['email'] = 'Please enter a valid email address.';
    }

    if (empty($password)) {
        $_SESSION['login_errors']['password'] = 'Please enter your password.';
    }

    // If no errors, proceed with login
    if (empty($_SESSION['login_errors'])) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM `user` WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if user exists and password is correct
            if ($user && $password === $user['password']) {
                // Set session variables for logged in user
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['first_name'];
                $_SESSION['user_last_name'] = $user['last_name'];
                $_SESSION['user_age'] = $user['age'];
                $_SESSION['user_phone'] = $user['phone'];
                $_SESSION['user_student'] = $user['is_student'];
                $_SESSION['user_employed'] = $user['is_employed'];




                // Redirect to myServices page
                header('Location: /~s3917002/wp/a2/myServices.php');
                exit();
            } else {
                $_SESSION['login_errors']['login'] = 'Invalid email or password. Please try again.';
                header('Location: /~s3917002/wp/a2/login.php');
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['login_errors']['database'] = 'Database error: ' . $e->getMessage();
            header('Location: /~s3917002/wp/a2/login.php');
            exit();
        }
    } else {
        // Redirect back to login with errors
        header('Location: /~s3917002/wp/a2/login.php');
        exit();
    }
}
?>
