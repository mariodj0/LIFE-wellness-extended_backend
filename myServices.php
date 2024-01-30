<!doctype html>
<html lang="en">
<?php
// Start session management and check if the user is logged in.
session_start();

require_once 'backend/myservice_process.php';

if (!isset($_SESSION['user_email'])) {
    // Redirect to the login page if the user is not logged in.
    header('Location: login.php');
    exit();
}

// Fetch all services details
$serviceDetails = getAllServices();
?>

<?php 
// Set the page title and include the head component.
$pageTitle = "My Services - LIFE";
require_once('includes/head.php'); 
?>

<head>
    <link rel="stylesheet" href="css/services.css"> 
</head>

<body>
    
<?php 
// Include the navigation header.
require_once('includes/header_nav.php'); 
?>

<main>
    <!-- Welcome message personalized for the logged-in user -->
    <div class="welcome-message">
        <h1>Welcome to My Services</h1>
        <p>Hi <?php echo htmlspecialchars($_SESSION['user_name']); ?>, welcome to your personalized services page!</p>
        <a href="backend/logout_process.php" class="logout-button">Logout</a>
    </div>

    <!-- Personalized Dashboard Section -->
    <section class="personal-dashboard">
        <h2>Your Dashboard</h2>
        <p>Quick access to your favorite services and recent activities.</p>
        <div class="dashboard-items">
            <!-- Yoga Icon -->
            <div class="item">
                <a href="yoga_service.php">
                    <img src="<?php echo htmlspecialchars($serviceDetails[1]['image_path']); ?>" alt="woman Yoga pose icon">
                    <h3><?php echo htmlspecialchars($serviceDetails[1]['name']); ?></h3>
                </a>
                <p>Select your Yoga level and preferences.</p>
            </div>
            <!-- Meditation Icon -->
            <div class="item">
                <a href="meditation_service.php">
                    <img src="<?php echo htmlspecialchars($serviceDetails[2]['image_path']); ?>" alt="woman in Meditation pose">
                    <h3><?php echo htmlspecialchars($serviceDetails[2]['name']); ?></h3>
                </a>
                <p>Choose the type of meditation that suits you.</p>
            </div>
            <!-- Stretching Icon -->
            <div class="item">
                <a href="stretching_service.php">
                    <img src="<?php echo htmlspecialchars($serviceDetails[3]['image_path']); ?>" alt="woman Stretching">
                    <h3><?php echo htmlspecialchars($serviceDetails[3]['name']); ?></h3>
                </a>
                <p>Customize your stretching routine.</p>
            </div>
            <!-- Healthy Habits Icon -->
            <div class="item">
                <a href="healthy_habits_service.php">
                    <img src="<?php echo htmlspecialchars($serviceDetails[4]['image_path']); ?>" alt="healthy food">
                    <h3><?php echo htmlspecialchars($serviceDetails[4]['name']); ?></h3>
                </a>
                <p>Develop and track your healthy habits.</p>
            </div>

        </div>
    </section>

    <!-- Customized Recommendations -->
    <section class="recommendations">
        <h2>Recommended for You</h2>
        <p>Based on your interests and activities, we suggest:</p>
        <ul>
            <!-- List of personalized recommendations -->
            <li><a href="#">Mindfulness Meditation Techniques</a></li>
            <li><a href="#">Personalized Yoga Sessions</a></li>

        </ul>
    </section>

    <!-- Exclusive Offers and Discounts -->
    <section class="exclusive-offers">
        <h2>Exclusive Offers</h2>
        <p>Special discounts and offers available only for our members.</p>
        <div class="offers">
            <!-- Individual offers with details -->
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

    <!-- Services and Resources Section -->
    <section class="services-and-resources">
        <div class="services-section">
            <h2>Exclusive Services for You</h2>
            <p>Explore a range of services specially curated for our members.</p>
            <div class="service-list">
                <!-- List of exclusive services -->
                <div class="service-item">
                    <h3>Personalized Wellness Plans</h3>
                    <p>Access your customized wellness and fitness plans.</p>
                </div>
                <div class="service-item">
                    <h3>Consultation Sessions</h3>
                    <p>Book a session with our wellness experts.</p>
                </div>
            </div>
        </div>

        <div class="resources-section">
            <h2>Resources and Materials</h2>
            <p>Exclusive articles, videos, and e-books for your wellness journey.</p>
            <ul>
                <!-- List of resources like articles and e-books -->
                <li><a href="#">Mindfulness for Beginners</a></li>
                <li><a href="#">Healthy Eating Guide</a></li>
            </ul>
        </div>
    </section>
</main>

<?php 
// Include the footer.
require_once('includes/footer.php'); 
?>
</body>
</html>
