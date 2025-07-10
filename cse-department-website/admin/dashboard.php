<?php
session_start();
require_once '../includes/config.php';
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | CSE Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="faculty/index.php">Faculty</a></li>
                        <li class="nav-item"><a class="nav-link" href="news/index.php">News</a></li>
                        <li class="nav-item"><a class="nav-link" href="events/index.php">Events</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery/index.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="placements/index.php">Placements</a></li>
                        <li class="nav-item"><a class="nav-link" href="settings/index.php">Settings</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h2 class="mt-5">Dashboard</h2>
                <p>Welcome to the admin panel.</p>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
