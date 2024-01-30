<?php
session_start();
require_once './backend/myservice_process.php';

if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit();
}

$selectedStretchingType = '';
$videoPath = '';
$stretchingId = 3; // 3 is the service_id for Stretching
$stretchingTypes = handleServiceFormSubmission($stretchingId, $selectedStretchingType, $videoPath);
?>

<!DOCTYPE html>
<html lang="en">
    
<?php 
    // Set the page title
$pageTitle = "Stretching Services - LIFE";
    require_once 'includes/head.php'; 
?>

<head>
    <link rel="stylesheet" href="css/stretching.css"> 
</head>
    
<body>
    <?php require_once 'includes/header_nav.php'; ?>

    <main>
            <section class="stretching-service-form">
                <h1>Welcome to Our Stretching Services</h1>
                <p>Choose your preferred stretching routine to enhance flexibility and reduce stress.</p>

                <form action="stretching_service.php" method="post">
                    <div class="stretching-options">
                        <?php foreach ($stretchingTypes as $type): ?>
                            <div class="stretching-option">
                                <input type="radio" id="<?= htmlspecialchars($type['service_type']) ?>" name="serviceType" value="<?= htmlspecialchars($type['service_type']) ?>" <?= $selectedStretchingType === $type['service_type'] ? 'checked' : '' ?>>
                                <label for="<?= htmlspecialchars($type['service_type']) ?>"><?= htmlspecialchars($type['service_type']) ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" id="duration" name="duration" value="0">

                    <div class="stretching-video-section">
                        <h2 class="video-title-placeholder"><?= $selectedStretchingType ? htmlspecialchars($selectedStretchingType) : 'Stretching Session Preview' ?></h2>
                        <div class="form-buttons">
                            <button type="submit" class="submit-stretching">Start Stretching Session</button>
                            <a href="myServices.php" class="back-button stretching-back-button">Back to My Services</a>
                        </div>
                        <div class="stretching-video-container">
                            <?php if ($videoPath): ?>
                                <video class="stretching-video-player" controls>
                                    <source src="<?= htmlspecialchars($videoPath) ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </section>
        </main>

    <?php require_once 'includes/footer.php'; ?>
    <script src="js/durationTracker.js"></script>
</body>
</html>
