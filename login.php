<!doctype html>
<html lang="en">
<?php
session_start();
// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: myServices.php');
    exit();
}
?>

<?php 
$pageTitle = "Login - LIFE";
require_once('includes/head.php'); 
?>

<body>
    
<?php 
require_once('includes/header_nav.php'); 
?>

<main>
    <div class="login-form-container">
        <h1>Login</h1>
        <form action="backend/login_process.php" method="post">
            <label for="email">Username:</label>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['login_input']['email'] ?? ''; ?>" required>
            <?php if(isset($_SESSION['login_errors']['email'])): ?>
                <span class="error visible-error"><?php echo $_SESSION['login_errors']['email']; ?></span>
            <?php endif; ?>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $_SESSION['login_input']['password'] ?? ''; ?>" required>
            <?php if(isset($_SESSION['login_errors']['password'])): ?>
                <span class="error visible-error"><?php echo $_SESSION['login_errors']['password']; ?></span>
            <?php endif; ?>

                <!-- General login error -->
            <?php if(isset($_SESSION['login_errors']['login'])): ?>
                <span class="error"><?php echo $_SESSION['login_errors']['login']; ?></span>
            <?php endif; ?>

            <!-- Database error -->
            <?php if(isset($_SESSION['login_errors']['database'])): ?>
                <span class="error"><?php echo $_SESSION['login_errors']['database']; ?></span>
            <?php endif; ?>

            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</main>

<?php 
require_once('includes/footer.php'); 
?>

<!-- Clear any session errors after they are displayed -->
<?php unset($_SESSION['login_errors']); ?>
<?php unset($_SESSION['login_input']); ?>

</body>
</html>
