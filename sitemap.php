<!doctype html>
<html lang="en">

<?php 
// Set the page title and include the head component.
$pageTitle = "Sitemap - LIFE";
require_once('includes/head.php'); 
?>

<body>
    
<?php 
// Include the navigation header of the website.
require_once('includes/header_nav.php'); 
?>

<main>
    <!-- Sitemap Section -->
    <section class="sitemap">
        <h1>LIFE Website Sitemap</h1>
        <p>Explore the various pages on our site:</p>
        <ul>
            <!-- List of main pages available on the website with links -->
            <li><a href="./index.php">Home</a></li>
            <li><a href="./services.php">Services</a>
                <!-- Nested list for specific services under the Services page -->
                <ul>
                    <li><a href="./services.php#yoga">Yoga</a></li>
                    <li><a href="./services.php#meditation">Meditation</a></li>
                    <li><a href="./services.php#healthy-habits">Healthy Habits</a></li>
                    <li><a href="./services.php#stretching">Stretching</a></li>
                </ul>
            </li>
            <li><a href="./covid.php">COVID-19 Resources</a></li>
            <li><a href="./contact.php">Contact Us</a></li>
            <li><a href="./register.php">Register</a></li>
            <li><a href="./privacy.php">Privacy Policy</a></li>
            <li><a href="./myServices.php">My Services</a></li>
            <li><a href="./login.php">Login</a></li>
        </ul>
    </section>
</main>

<?php 
// Include the footer file.
require_once('includes/footer.php'); 
?>

</body>
</html>
