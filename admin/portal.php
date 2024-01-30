<?php
// Database connection
require_once '../backend/db_access.php';

// Fetch registered users and services
$users = getAllUsers();
$services = getAllServices_db();

// Initialize variables
$selectedUser = '';
$searchedService = '';
$serviceDetails = [];
$filteredServices = $services; // Initially display all services

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedUser = $_POST['user'];
    $searchedService = $_POST['service'] ?? '';

    // Filter services based on search
    if ($searchedService !== '') {
        $filteredServices = array_filter($services, function($service) use ($searchedService) {
            return stripos($service['name'], $searchedService) !== false;
        });
    }

    // Check if only one service matches the search
    $singleServiceMatch = count($filteredServices) == 1;

    // If a single service is matched or a full service name is provided, fetch and display details
    if ($singleServiceMatch || !empty($searchedService)) {
        $serviceDetails = getServiceDetails($selectedUser, array_values($filteredServices)[0]['name']);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Portal Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="jumbotron bg-light border">
            <h1 class="display-4">Welcome to the Admin Dashboard</h1>
            <p class="lead">Here you can manage users, services, and view detailed statistics.</p>
        </div>

        <section>
            <h2>User and Service Selection</h2>
            <form action="portal.php" method="post" class="mb-3">
                <div class="row">
                    <!-- User selection -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user">Select a user:</label>
                            <select id="user" name="user" class="form-control">
                                <?php foreach ($users as $user): ?>
                                    <option value="<?= htmlspecialchars($user) ?>" <?= $selectedUser === $user ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($user) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Service search -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="service">Search for a service:</label>
                            <input type="text" id="service" name="service" class="form-control" value="<?= htmlspecialchars($searchedService) ?>">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </section>

        <section>
            <h2>Service Icons</h2>
            <div class="row">
                <?php foreach ($filteredServices as $service): ?>
                    <div class="col-md-3 mb-3 text-center">
                        <?php 
                        $iconName = strtolower($service['name']) === 'healthy habits' ? 'healthy' : strtolower(str_replace(' ', '_', $service['name']));
                        ?>
                        <img src="../assets/images/<?= $iconName ?>_icon.png" alt="<?= htmlspecialchars($service['name']) ?>" class="img-fluid" />
                        <p><?= htmlspecialchars($service['name']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <?php if (!empty($serviceDetails)): ?>
            <section>
                <h2>Service Details Chart</h2>
                <canvas id="chart" style="height: 400px;"></canvas>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    var serviceDetails = <?= json_encode($serviceDetails) ?>;
                    var ctx = document.getElementById('chart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar', // Chart type
                        data: {
                            labels: serviceDetails.map(item => item.date_performed),
                            datasets: [{
                                label: 'Duration (minutes)',
                                data: serviceDetails.map(item => item.duration_minutes),
                                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                                borderColor: 'rgba(0, 123, 255, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </section>
        <?php endif; ?>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block mb-3 text-muted">&copy; 2024 Admin Dashboard</small>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
