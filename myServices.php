<!doctype html>
<html lang="en">
<?php
session_start();
// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit();
}
?>

<?php 
$pageTitle = "My Services - LIFE";
require_once('includes/head.php'); 
?>

<body>
    
<?php 
require_once('includes/header_nav.php'); 
?>

<main>
    <div class="welcome-message">
        <h1>Welcome to My Services</h1>
        <p>Hi <?php echo htmlspecialchars($_SESSION['user_name']); ?>, welcome to your personalized services page!</p>
        <a href="backend/logout_process.php" class="logout-button">Logout</a>
    </div>

    <!-- Personalized Dashboard -->
    <section class="personal-dashboard">
        <h2>Your Dashboard</h2>
        <p>Quick access to your favorite services and recent activities.</p>
        <div class="dashboard-items">
            <div class="item">
                <h3>Your Activity Log</h3>
                <p>Review your recent wellness activities and progress.</p>
            </div>
            <div class="item">
                <h3>Upcoming Appointments</h3>
                <p>See your scheduled sessions and manage appointments.</p>
            </div>
        </div>
    </section>

    <!-- Customized Recommendations -->
    <section class="recommendations">
        <h2>Recommended for You</h2>
        <p>Based on your interests and activities, we suggest:</p>
        <ul>
            <li><a href="#">Mindfulness Meditation Techniques</a></li>
            <li><a href="#">Personalized Yoga Sessions</a></li>
            <!-- More recommendations -->
        </ul>
    </section>

    <!-- Exclusive Offers and Discounts -->
    <section class="exclusive-offers">
        <h2>Exclusive Offers</h2>
        <p>Special discounts and offers available only for our members.</p>
        <div class="offers">
            <div class="offer">
                <h3>Discount on Nutrition Plans</h3>
                <p>Get 20% off on personalized nutrition plans this month.</p>
            </div>
            <div class="offer">
                <h3>Free Wellness Webinar</h3>
                <p>Join our free webinar on stress management techniques.</p>
            </div>
        </div>
    </section>

    <!-- Services and Resources -->
    <section class="services-and-resources">
        <div class="services-section">
            <h2>Exclusive Services for You</h2>
            <p>Explore a range of services specially curated for our members.</p>
            <div class="service-list">
                <div class="service-item">
                    <h3>Personalized Wellness Plans</h3>
                    <p>Access your customized wellness and fitness plans.</p>
                </div>
                <div class="service-item">
                    <h3>Consultation Sessions</h3>
                    <p>Book a session with our wellness experts.</p>
                </div>
                <!-- Add more services as needed -->
            </div>
        </div>

        <div class="resources-section">
            <h2>Resources and Materials</h2>
            <p>Exclusive articles, videos, and e-books for your wellness journey.</p>
            <ul>
                <li><a href="#">Mindfulness for Beginners</a></li>
                <li><a href="#">Healthy Eating Guide</a></li>
                <!-- Add more resources as needed -->
            </ul>
        </div>
    </section>
</main>

<?php 
require_once('includes/footer.php'); 
?>
</body>
</html>
