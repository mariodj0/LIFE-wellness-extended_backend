<?php

ini_set('display_errors', 1);  // Show errors for debugging (remove this line when website on teaching server)
error_reporting(E_ALL); // Show all possible errors (remove this line when website on teaching server)


require_once 'db_access.php'; // Make sure this points to the correct path of your db_access.php file

try {
    // Get all table names from the database
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if ($tables) {
        // Select the first table
        $firstTableName = $tables[0];

        // Query the first 5 rows from the first table
        $stmt = $pdo->query("SELECT * FROM `$firstTableName` LIMIT 5");
        $rows = $stmt->fetchAll();

        // Output the column names and rows of the first table
        if ($rows) {
            echo "Showing the first 5 rows from the table '{$firstTableName}':<br/>";
            echo "<table border='1'>";
            
            // Header row with column names
            echo "<tr>";
            foreach ($rows[0] as $columnName => $value) {
                echo "<th>" . htmlspecialchars($columnName) . "</th>";
            }
            echo "</tr>";

            // Data rows
            foreach ($rows as $row) {
                echo "<tr>";
                foreach ($row as $columnName => $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "The table '{$firstTableName}' is empty.";
        }
    } else {
        echo "No tables found in the database.";
    }
} catch (PDOException $e) {
    echo "Error querying database: " . $e->getMessage();
}

?>

