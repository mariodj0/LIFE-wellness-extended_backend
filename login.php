<!doctype html>
<html lang="en">
<?php
// Start a new session or resume the existing one.
session_start();

// Redirect to 'myServices.php' if the user is already logged in.
if (isset($_SESSION['user_id'])) {
    header('Location: myServices.php');
    exit();
}
?>

<?php 
// Set the page title and include the common head elements.
$pageTitle = "Login - LIFE";
require_once('includes/head.php'); 
?>

<body>
    
<?php 
// Include the navigation header.
require_once('includes/header_nav.php'); 
?>

<main>
    <!-- Login form container -->
    <div class="login-form-container">
        <h1>Login</h1>
        <!-- Form that submits to 'login_process.php' for backend processing -->
        <form action="backend/login_process.php" method="post">
            <!-- Email input field -->
            <label for="email">Username:</label>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['login_input']['email'] ?? ''; ?>" required>
            <!-- Displaying any email-specific error messages from the session -->
            <?php if(isset($_SESSION['login_errors']['email'])): ?>
                <span class="error visible-error"><?php echo $_SESSION['login_errors']['email']; ?></span>
            <?php endif; ?>

            <!-- Password input field -->
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $_SESSION['login_input']['password'] ?? ''; ?>" required>
            <!-- Displaying any password-specific error messages from the session -->
            <?php if(isset($_SESSION['login_errors']['password'])): ?>
                <span class="error visible-error"><?php echo $_SESSION['login_errors']['password']; ?></span>
            <?php endif; ?>

            <!-- Displaying general login error message -->
            <?php if(isset($_SESSION['login_errors']['login'])): ?>
                <span class="error"><?php echo $_SESSION['login_errors']['login']; ?></span>
            <?php endif; ?>

            <!-- Displaying database error message -->
            <?php if(isset($_SESSION['login_errors']['database'])): ?>
                <span class="error"><?php echo $_SESSION['login_errors']['database']; ?></span>
            <?php endif; ?>

            <button type="submit">Login</button>
        </form>
        <!-- Link to registration page for new users -->
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</main>

<?php 
// Include the footer file.
require_once('includes/footer.php'); 
?>

<!-- Clear any session errors and input values after they are displayed -->
<?php 
unset($_SESSION['login_errors']); 
unset($_SESSION['login_input']); 
?>

</body>
</html>
