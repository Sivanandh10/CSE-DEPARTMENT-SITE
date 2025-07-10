<?php
session_start();
require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Faculty of CSE Department, Erode Sengunthar Engineering College">
    <title>Faculty | CSE Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <section class="faculty py-5">
        <div class="container">
            <h2>Our Faculty</h2>
            <div class="row">
                <?php
                $sql = "SELECT * FROM faculty WHERE status = 'active'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4"><div class="card"><img src="assets/uploads/' . htmlspecialchars($row['photo']) . '" class="card-img-top" alt="' . htmlspecialchars($row['name']) . '"><div class="card-body"><h5 class="card-title">' . htmlspecialchars($row['name']) . '</h5><p>' . htmlspecialchars($row['designation']) . '</p><p>' . htmlspecialchars($row['qualification']) . '</p><p>' . htmlspecialchars($row['email']) . '</p></div></div></div>';
                }
                ?>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
