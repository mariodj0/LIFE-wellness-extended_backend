<!doctype html>
<html lang="en">
<?php
session_start();
// Redirect to registration page if no success message is set
if (!isset($_SESSION['success_message'])) {
    header('Location: register.php');
    exit();
}
?>

<?php 
$pageTitle = "Welcome - LIFE";
require_once('includes/head.php'); 
?>

<body>
    
<?php 
require_once('includes/header_nav.php'); 
?>

<main>
    <div class="welcome-message">
        <h1>Welcome to LIFE</h1>
        <?php if(isset($_SESSION['user_details'])): ?>
            <p>Thank you for registering, <?php echo htmlspecialchars($_SESSION['user_details']['first_name']); ?>!</p>
            <p>Your registration details:</p>
            <ul>
                <li>First name: <?php echo htmlspecialchars($_SESSION['user_details']['first_name']); ?></li>
                <li>Last name: <?php echo htmlspecialchars($_SESSION['user_details']['last_name']); ?></li>
                <li>Email: <?php echo htmlspecialchars($_SESSION['user_details']['email']); ?></li>
                <li>Phone: <?php echo htmlspecialchars($_SESSION['user_details']['phone']); ?></li>
                <li>Age: <?php echo htmlspecialchars($_SESSION['user_details']['age']); ?></li>
                <li>Student: <?php echo htmlspecialchars($_SESSION['user_details']['is_student'] ? 'Yes' : 'No'); ?></li>
                <li>Employed: <?php echo htmlspecialchars($_SESSION['user_details']['is_employed'] ? 'Yes' : 'No'); ?></li>

                <!-- Add other details as needed -->
            </ul>
            <p>Your annual membership fee: $<?php echo htmlspecialchars($_SESSION['membership_fee']); ?></p>
        <?php endif; ?>
        <a href="login.php" class="login-button">Click here to log in</a>
    </div>
</main>

<?php 
require_once('includes/footer.php'); 
?>

</body>
</html>
<?php
// Clear the session variables after displaying them
unset($_SESSION['success_message']);
unset($_SESSION['user_details']);
unset($_SESSION['membership_fee']);
?>
