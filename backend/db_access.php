<?php

ini_set('display_errors', 1);  // Show errors for debugging (remove this line when website on teaching server)
error_reporting(E_ALL); // Show all possible errors (remove this line when website on teaching server)


// Database connection details
$servername = "rmit.australiaeast.cloudapp.azure.com";
$username = "s3917002_wp_a2"; // Replace with your database username
$password = "s3917002"; // Replace with your database password
$dbname = "s3917002_wp_a2"; // Replace with your database name

// DSN (Data Source Name) for MySQL connection
$dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";

// Options for PDO
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // make the default fetch be an associative array
];

try {
    // Creating a PDO instance and connecting to the database
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // Catch and display any connection errors
    die("Connection failed: " . $e->getMessage());
}

// You can now use $pdo to perform database operations throughout your application

?>
