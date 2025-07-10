<?php
session_start();
require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Events, CSE Department, Erode Sengunthar Engineering College">
    <title>Events | CSE Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <section class="events py-5">
        <div class="container">
            <h2>Events & Activities</h2>
            <div class="row">
                <?php
                $sql = "SELECT * FROM events WHERE status = 'active'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4"><div class="card"><img src="assets/uploads/' . htmlspecialchars($row['image']) . '" class="card-img-top" alt="' . htmlspecialchars($row['title']) . '"><div class="card-body"><h5 class="card-title">' . htmlspecialchars($row['title']) . '</h5><p>' . htmlspecialchars($row['description']) . '</p><p>Date: ' . htmlspecialchars($row['date']) . '</p></div></div></div>';
                }
                ?>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
