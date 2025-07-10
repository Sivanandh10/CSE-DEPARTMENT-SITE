<?php
session_start();
require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About CSE Department, Erode Sengunthar Engineering College">
    <title>About CSE | Erode Sengunthar Engineering College</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <section class="about py-5">
        <div class="container">
            <h2>About the Department</h2>
            <p>Established in 1996, the CSE Department at Erode Sengunthar Engineering College is committed to excellence in education and research.</p>
            <h3>Vision</h3>
            <p>To be a center of excellence in computer science education and research.</p>
            <h3>Mission</h3>
            <p>To empower students with cutting-edge knowledge and skills in computer science.</p>
            <h3>HOD Message</h3>
            <p>Welcome to the CSE Department...</p>
            <h3>Infrastructure</h3>
            <p>State-of-the-art labs, high-speed internet, and smart classrooms.</p>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
