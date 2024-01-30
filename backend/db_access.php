<?php

// These lines are for debugging purposes.
//ini_set('display_errors', 1);  // Show errors for debugging
//error_reporting(E_ALL); // Show all possible errors

// Database connection details
$servername = "rmit.australiaeast.cloudapp.azure.com";
$username = "s3917002_wp_a2"; 
$password = "s3917002"; 
$dbname = "s3917002_wp_a2"; 

// DSN (Data Source Name) string for MySQL connection
$dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";

// Options for the PDO connection
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exceptions for errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Set default fetch mode to associative array
];

try {
    // Attempt to create a new PDO instance and connect to the database.
    // The PDO instance is stored in the $pdo variable.
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // If connection fails, catch the error and terminate the script with a message.
    die("Connection failed: " . $e->getMessage());
}



function getAllUsers() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT email FROM user"); 
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function getAllServices_db() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT service_id, name FROM service");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getServiceDetails($user, $serviceName) {
    global $pdo;

    // First, get the service_id from the service name
    $serviceStmt = $pdo->prepare("SELECT service_id FROM service WHERE name = ?");
    $serviceStmt->execute([$serviceName]);
    $service = $serviceStmt->fetch();
    if (!$service) {
        return []; // Service not found
    }
    $serviceId = $service['service_id'];

    // Now, fetch user service details
    $stmt = $pdo->prepare("SELECT date_performed, duration_minutes FROM user_service WHERE email = ? AND service_id = ?");
    $stmt->execute([$user, $serviceId]);
    return $stmt->fetchAll();
}

?>
