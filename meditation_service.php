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
$selectedMeditationType = '';
$mediaPath = '';
$meditationId = 2;

// Fetch meditation types and handle form submission
$meditationTypes = handleServiceFormSubmission($meditationId , $selectedMeditationType, $mediaPath); // 2 is the service_id for Meditation
?>

<!DOCTYPE html>
<html lang="en">
<?php 
// Set the page title
$pageTitle = "Meditation Services - LIFE";

// Include the head section
require_once 'includes/head.php'; 
?>

<head>
    <link rel="stylesheet" href="css/meditation.css"> 
</head>

<body>
    <?php 
    // Include the header navigation
    require_once 'includes/header_nav.php'; 
    ?>

    <main>
        <section class="meditation-service-form">
            <h1>Welcome to Our Meditation Services</h1>
            <p>Select the type of meditation session that suits your preference.</p>
            
            <div class="meditation-video-section">
                <!-- Display the selected meditation type or a default message -->
                <h2><?= $selectedMeditationType ? htmlspecialchars($selectedMeditationType) : 'Meditation Session Preview' ?></h2>
                <div class="meditation-media-container">
                    <?php if ($mediaPath): ?>
                        <?php 
                        // If the media is a video, display a video player
                        if (strpos($mediaPath, '.mp4') !== false): 
                        ?>
                            <video class="meditation-video-player" controls>
                                <source src="<?= htmlspecialchars($mediaPath) ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php 
                        // If the media is an audio, display an audio player
                        elseif (strpos($mediaPath, '.mp3') !== false): 
                        ?>
                            <audio class="meditation-audio-player" controls>
                                <source src="<?= htmlspecialchars($mediaPath) ?>" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Form for selecting the meditation type -->
            <form action="meditation_service.php" method="post">
                <?php 
                // Display a radio button for each meditation type
                foreach ($meditationTypes as $type): 
                ?>
                    <div class="meditation-option">
                        <input type="radio" id="<?= htmlspecialchars($type['service_type']) ?>" name="serviceType" value="<?= htmlspecialchars($type['service_type']) ?>"<?= $selectedMeditationType === $type['service_type'] ? ' checked' : '' ?>>
                        <label for="<?= htmlspecialchars($type['service_type']) ?>"><?= htmlspecialchars($type['service_type']) ?></label>
                    </div>
                <?php endforeach; ?>
                
                <!-- Hidden input field for duration -->
                <input type="hidden" id="duration" name="duration" value="0">

                <!-- Buttons for submitting the form and going back -->
                <div class="form-buttons">
                    <button type="submit" class="submit-meditation">Start Meditation Session</button>
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