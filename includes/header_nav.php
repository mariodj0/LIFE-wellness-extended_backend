<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<header>
    <div class="logo">
        <p><a href="./index.php"><img src="./assets/logo.png" alt="LIFE Logo">Living It Fully Everyday!</a></p>
        
    </div>
    <nav>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li class="dropdown">
                <a href="./services.php">Services</a>
                <ul class="dropdown-content">
                    <li><a href="./services.php#yoga">Yoga</a></li>
                    <li><a href="./services.php#meditation">Meditation</a></li>
                    <li><a href="./services.php#healthy-habits">Healthy Habits</a></li>
                     <li><a href="./services.php#stretching">Stretching</a></li>
                </ul>
            </li>
            <li><a href="./covid.php">COVID-19 Resources</a></li>
            <li><a href="./contact.php">Contact Us</a></li>
            <li><a href="./sitemap.php">Sitemap</a></li>
            <li><a href="./register.php" class="register-link">Register</a></li>
            <!-- Conditionally display Login or Logout -->
            <?php if (isset($_SESSION['user_email'])): ?>
                <li><a href="/~s3917002/wp/a2/backend/logout_process.php" class="login-link">Logout</a></li>
            <?php else: ?>
                <li><a href="./login.php" class="login-link">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

</header>