<!doctype html>
<html lang="en">

<?php 
#session_start(); 
$pageTitle = "Login - LIFE";
require_once('includes/head.php'); 
?>

<body>
    
<?php 
require_once('includes/header_nav.php'); 
?>

<main>
    <div class="login-container">
        <h1>Login to LIFE</h1>
        <form action="login_process.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <!-- Optionally, display a message if redirected from successful registration -->
        
        <?php if(isset($_SESSION['success_message'])): ?>
            <p class="success-message"><?php echo $_SESSION['success_message']; ?></p>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

    </div>
</main>

<?php 
require_once('includes/footer.php'); 
?>

</body>
</html>
