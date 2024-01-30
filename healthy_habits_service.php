<?php
session_start();
require_once './backend/myservice_process.php';

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit();
}

// Initialize variables
$selectedDietType = '';
$mealRecommendations = [];

// Fetch meal types
$mealTypes = getMealTypes();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedDietType = $_POST['dietType'];
    $mealRecommendations = getMealRecommendations($selectedDietType);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php 
$pageTitle = "Healthy Habits - LIFE";
require_once 'includes/head.php'; 
?>


<head>
    <link rel="stylesheet" href="css/health.css"> 
</head>

<body>
    <?php require_once 'includes/header_nav.php'; ?>

    <main>
        <section class="healthy-habits-form">
            <h1>Welcome to Healthy Habits</h1>
            <p>Choose your preferred diet type to get personalized meal recommendations.</p>

            <form action="healthy_habits_service.php" method="post" class="diet-form">
                <div class="diet-type-selection">
                    <?php foreach ($mealTypes as $type): ?>
                        <div class="diet-option">
                            <input type="radio" id="<?= htmlspecialchars($type) ?>" name="dietType" value="<?= htmlspecialchars($type) ?>" <?= $selectedDietType === $type ? 'checked' : '' ?>>
                            <label for="<?= htmlspecialchars($type) ?>"><?= htmlspecialchars($type) ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="submit" class="submit-diet">Get Recommendations</button>
            </form>
            <a href="myServices.php" class="back-button">Back to My Services</a>

            <?php if ($mealRecommendations): ?>
                <div class="meal-recommendations">
                    <h2>Meal Recommendations for <?= htmlspecialchars($selectedDietType) ?></h2>
                    <div class="meals-container">
                        <?php foreach ($mealRecommendations as $meal): ?>
                            <div class="meal-item">
                                <h3><?= htmlspecialchars($meal['name']) ?></h3>
                                <p>Kilojoules: <?= htmlspecialchars($meal['kilojoules']) ?></p>
                                <?php if ($meal['image_path']): ?>
                                    <img src="<?= htmlspecialchars($meal['image_path']) ?>" alt="Image of <?= htmlspecialchars($meal['name']) ?>">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <?php require_once 'includes/footer.php'; ?>
    <script src="js/durationTracker.js"></script>
</body>
</html>
