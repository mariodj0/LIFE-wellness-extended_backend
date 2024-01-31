<?php
// Start the session
session_start();

// Include the process file
require_once './backend/myservice_process.php';

// If the user is not logged in, redirect to login page
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit();
}

// Initialize variables
$selectedYogaType = '';
$videoPath = '';

// Service ID for Yoga
$yogaServiceId = 1;

// Fetch yoga types and handle form submission
$yogaTypes = handleServiceFormSubmission($yogaServiceId, $selectedYogaType, $videoPath);
?>

<!DOCTYPE html>
<html lang="en">
<?php 
// Set the page title
$pageTitle = "Yoga Services - LIFE";

// Include the head section
require_once 'includes/head.php'; 
?>
<head>
    <link rel="stylesheet" href="css/yoga.css"> 
</head>
<body>
    <?php 
    // Include the header navigation
    require_once 'includes/header_nav.php'; 
    ?>

    <main>
        <section class="yoga-service-form">
            <h1>Welcome to Our Yoga Services</h1>
            <p>Select the type of yoga session that suits your level and preference.</p>

            <!-- Video Placeholder -->
            <div class="yoga-video-section">
                <!-- Display the selected yoga type or a default message -->
                <h2 class="video-title-placeholder"><?= $selectedYogaType ? htmlspecialchars($selectedYogaType) : 'Yoga Session Preview' ?></h2>
                <div class="yoga-video-container">
                    <!-- Display the selected video or a placeholder video -->
                    <?php if ($videoPath): ?>
                        <video class="yoga-video-player" controls>
                            <source src="<?= htmlspecialchars($videoPath) ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Yoga Type Selection Form -->
            <form action="yoga_service.php" method="post">
                <?php 
                // Display a radio button for each yoga type
                foreach ($yogaTypes as $type): 
                ?>
                    <div class="yoga-option">
                        <input type="radio" id="<?= htmlspecialchars($type['service_type']) ?>" name="serviceType" value="<?= htmlspecialchars($type['service_type']) ?>"<?= $selectedYogaType === $type['service_type'] ? ' checked' : '' ?>>
                        <label for="<?= htmlspecialchars($type['service_type']) ?>"><?= htmlspecialchars($type['service_type']) ?></label>
                    </div>
                <?php endforeach; ?>
                
                <!-- Hidden input field for duration -->
                <input type="hidden" id="duration" name="duration" value="0">

                <!-- Buttons for submitting the form and going back -->
                <div class="form-buttons">
                    <button type="submit" class="submit-yoga">Start Yoga Session</button>
                    <a href="myServices.php" class="back-button">Back to My Services</a>
                </div>
            </form>
        </section>
    </main>

    <?php 
    // Include the footer
    require_once 'includes/footer.php'; 
    ?>
    
    <!-- Include the duration tracker script -->
    <script src="js/durationTracker.js"></script>
</body>
</html>