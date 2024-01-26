<?php
session_start();
require_once 'db_access.php';

// Function to sanitize user input
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Function to validate name format
function validateName($name) {
    return preg_match('/^[a-zA-Z\s\-]+$/', $name);
}


// Function to validate Australian mobile numbers
function validatePhoneNumber($number) {
    return preg_match('/^\+61\s?4\d{2}\s?\d{3}\s?\d{3}$/', $number);
}

// Function to validate password format
function validatePassword($password) {
    return preg_match('/^[A-Z][\w\-]{6,}[0-9]$/', $password);
}

// Function to calculate membership fee
function calculateMembershipFee($age, $is_student, $is_employed) {
    // Logic for calculating membership fee
    $baseMonthlyFee = 10;
    $discount = 0;

    if ($age >= 16 && $age <= 20) {
        $discount += 0.10; // 10% discount for age between 16 and 20
    }

    if ($is_student) {
        $discount += 0.05; // Additional 5% discount for students
    }

    if (!$is_employed) {
        $discount += 0.40; // Additional 40% discount for unemployed
    }

    $finalMonthlyFee = $baseMonthlyFee * (1 - $discount);
    $annualFee = $finalMonthlyFee * 12;

    return $annualFee;

}

// Initialize arrays to store user input and errors
$_SESSION['user_input'] = [];
$_SESSION['registration_errors'] = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and assign form data
    foreach ($_POST as $key => $value) {
        $_SESSION['user_input'][$key] = sanitizeInput($value);
    }

    // Extract sanitized input for ease of use
    $email = $_SESSION['user_input']['email'];
    $confirm_email = $_SESSION['user_input']['confirmEmail'];
    $password = $_SESSION['user_input']['password'];
    $confirm_password = $_SESSION['user_input']['confirmPassword'];
    $first_name = $_SESSION['user_input']['firstName'];
    $last_name = $_SESSION['user_input']['lastName'];
    $phone = $_SESSION['user_input']['phoneNumber'];
    $age = $_SESSION['user_input']['age'];
    // Convert boolean values to integers directly in the assignment
    $is_student = ($_SESSION['user_input']['studentStatus'] === 'Yes') ? 1 : 0;
    $is_employed = ($_SESSION['user_input']['employmentStatus'] === 'Yes') ? 1 : 0;



    // Validate input data and populate errors

    if (!validateName($first_name)) {
        $_SESSION['registration_errors']['firstName'] = 'Invalid first name format. Only letters, spaces, and hyphens are allowed.';
    }
    
    if (!validateName($last_name)) {
        $_SESSION['registration_errors']['lastName'] = 'Invalid last name format. Only letters, spaces, and hyphens are allowed.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['registration_errors']['email'] = 'Invalid email format ';
    }
    if ($email !== $confirm_email) {
        $_SESSION['registration_errors']['confirmEmail'] = 'Email addresses do not match';
    }
    if (!validatePassword($password)) {
        $_SESSION['registration_errors']['password'] = 'Invalid password format (must start with a capital letter, end with a number, and be at least 8 characters long)';
    }
    if ($password !== $confirm_password) {
        $_SESSION['registration_errors']['confirmPassword'] = 'Passwords do not match';
    }
    if (!validatePhoneNumber($phone)) {
        $_SESSION['registration_errors']['phoneNumber'] = 'Invalid phone number format (must be in the format +61 4XX XXX XXX)';
    }
    if ($age < 16 || $age > 120) {
        $_SESSION['registration_errors']['age'] = 'Invalid age or you must be at least 16 years old to register';
    }
    // ... other validations ...

    // Proceed if no errors
    if (count($_SESSION['registration_errors']) === 0) {
        // Calculate membership fee
        $membershipFee = calculateMembershipFee($age, $is_student, $is_employed);
        
        try {
            // Insert user data into the database
             // Prepare SQL and bind parameters
            $stmt = $pdo->prepare("INSERT INTO `user` (email, password, first_name, last_name, phone, age, is_student, is_employed) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$email, $password, $first_name, $last_name, $phone, $age, $is_student, $is_employed]);

            // Set session variables for success message and membership fee
            $_SESSION['success_message'] = 'Registration successful!';
            $_SESSION['membership_fee'] = $membershipFee;
            $_SESSION['user_details'] = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => $phone,
                'age' => $age,
                'is_student' => $is_student,
                'is_employed' => $is_employed

                
                // Add other details as needed
            ];
            

            // Redirect to login page on successful registration
            header('Location: /~s3917002/wp/a2/welcome.php');
            exit();
        } catch (PDOException $e) {
            // Handle database errors
            // Check for duplicate email entry
            if ($e->errorInfo[1] == 1062) {
                $_SESSION['registration_errors']['email'] = 'This email has already been used. Please choose another email.';
            } else {
                // Handle other database errors
                $_SESSION['registration_errors']['database'] = 'Database error: ' . $e->getMessage();
            }
        }
    }

    // Redirect back to registration form on error
    header('Location: /~s3917002/wp/a2/register.php');
    exit();
}
?>
