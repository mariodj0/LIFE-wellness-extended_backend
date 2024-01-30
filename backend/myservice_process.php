<?php
// Include the database connection file
require_once 'db_access.php';

// Function to get service types based on service ID
function getServiceTypes($serviceId) {
    global $pdo;

    try {
        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare("SELECT service_type, path FROM service_instruction WHERE service_id = ?");
        $stmt->execute([$serviceId]);
        // Return all fetched rows
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        // Handle any PDO exceptions
        die("Database error: " . $e->getMessage());
    }
}

// Function to insert user service details into the database
function insertUserService($email, $serviceId, $serviceType, $duration) {
    global $pdo;

    // Get the current date
    $datePerformed = date('Y-m-d');
    try {
        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare("INSERT INTO user_service (email, service_id, service_type, date_performed, duration_minutes) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$email, $serviceId, $serviceType, $datePerformed, $duration]);
    } catch (PDOException $e) {
        // Handle any PDO exceptions
        die("Database error: " . $e->getMessage());
    }
}

// Function to handle service form submission
function handleServiceFormSubmission($serviceId, &$selectedType, &$videoPath) {
    // Get the service types
    $types = getServiceTypes($serviceId);

    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if 'serviceType' is set in POST data
        if (isset($_POST['serviceType'])) {
            // Get the selected service type
            $selectedType = $_POST['serviceType'];
            // Get the duration, ensure it's an integer and not less than 0
            $duration = isset($_POST['duration']) ? max(0, (int)$_POST['duration']) : 0;

            // Loop through the types to find the selected one
            foreach ($types as $type) {
                if ($type['service_type'] === $selectedType) {
                    // Set the video path
                    $videoPath = $type['path'];
                    break;
                }
            }

            // Insert the user service details into the database
            insertUserService($_SESSION['user_email'], $serviceId, $selectedType, $duration);
        }
    }

    // Return the service types
    return $types;
}

// Function to get all services details
function getAllServices() {
    global $pdo;
    $serviceDetails = [];

    try {
        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare("SELECT service_id, name, image_path FROM service");
        $stmt->execute();
        $services = $stmt->fetchAll();

        // Loop through the services to build the service details array
        foreach ($services as $service) {
            $serviceDetails[$service['service_id']] = [
                'name' => $service['name'],
                'image_path' => $service['image_path']
            ];
        }

        // Return the service details
        return $serviceDetails;
    } catch (PDOException $e) {
        // Handle any PDO exceptions
        die("Database error: " . $e->getMessage());
    }
}




// Function to fetch different meal types
function getMealTypes() {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT DISTINCT type FROM meal");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}

// Function to insert or update user meal preferences
function saveUserMealPreference($email, $mealId, $servings) {
    global $pdo;

    try {
        // Check if the user already has a preference set for the specified meal
        $stmt = $pdo->prepare("SELECT * FROM user_meal WHERE email = ? AND meal_id = ?");
        $stmt->execute([$email, $mealId]);
        $existingPreference = $stmt->fetch();

        if ($existingPreference) {
            // Update existing record
            $updateStmt = $pdo->prepare("UPDATE user_meal SET servings = ? WHERE email = ? AND meal_id = ?");
            $updateStmt->execute([$servings, $email, $mealId]);
        } else {
            // Insert a new record
            $insertStmt = $pdo->prepare("INSERT INTO user_meal (email, meal_id, servings) VALUES (?, ?, ?)");
            $insertStmt->execute([$email, $mealId, $servings]);
        }
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}


// Function to get meal recommendations based on the selected meal type
function getMealRecommendations($mealType) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT name, kilojoules, image_path FROM meal WHERE type = ?");
        $stmt->execute([$mealType]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}

?>