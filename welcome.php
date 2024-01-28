<!doctype html>
<html lang="en">
<?php
// Initialize the session and check if the 'success_message' is set, indicating successful registration. 
// Redirect to the registration page if it is not set.
session_start();
if (!isset($_SESSION['success_message'])) {
    header('Location: register.php');
    exit();
}
?>

<?php 
// Set the page title and include the head component.
$pageTitle = "Welcome - LIFE";
require_once('includes/head.php'); 
?>

<body>
    
<?php 
// Include the navigation header of the website.
require_once('includes/header_nav.php'); 
?>

<main>
    <!-- Welcome Message Section -->
    <div class="welcome-message">
        <h1>Welcome to LIFE</h1>
        <?php if(isset($_SESSION['user_details'])): ?>
            <!-- Display a personalized welcome message using user's first name from session data -->
            <p>Thank you for registering, <?php echo htmlspecialchars($_SESSION['user_details']['first_name']); ?>!</p>
            <p>Your registration details:</p>
            <ul>
                <!-- Display user's registration details securely using htmlspecialchars to prevent XSS -->
                <li>First name: <?php echo htmlspecialchars($_SESSION['user_details']['first_name']); ?></li>
                <li>Last name: <?php echo htmlspecialchars($_SESSION['user_details']['last_name']); ?></li>
                <li>Email: <?php echo htmlspecialchars($_SESSION['user_details']['email']); ?></li>
                <li>Phone: <?php echo htmlspecialchars($_SESSION['user_details']['phone']); ?></li>
                <li>Age: <?php echo htmlspecialchars($_SESSION['user_details']['age']); ?></li>
                <li>Student: <?php echo htmlspecialchars($_SESSION['user_details']['is_student'] ? 'Yes' : 'No'); ?></li>
                <li>Employed: <?php echo htmlspecialchars($_SESSION['user_details']['is_employed'] ? 'Yes' : 'No'); ?></li>
            </ul>
            <p>Your annual membership fee: $<?php echo htmlspecialchars($_SESSION['membership_fee']); ?></p>
        <?php endif; ?>
        <!-- Link to login page -->
        <a href="login.php" class="login-button">Click here to log in</a>
    </div>
</main>

<?php 
// Include the footer file.
require_once('includes/footer.php'); 
?>

</body>
</html>
<?php
// Clear the session variables after displaying them.
unset($_SESSION['success_message']);
unset($_SESSION['user_details']);
unset($_SESSION['membership_fee']);
?>
