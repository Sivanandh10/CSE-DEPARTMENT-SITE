<?php
session_start();
require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Placements, CSE Department, Erode Sengunthar Engineering College">
    <title>Placements | CSE Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <section class="placements py-5">
        <div class="container">
            <h2>Placements</h2>
            <p>95% placement rate with top recruiters like TCS, Infosys, and Wipro.</p>
            <div class="row">
                <?php
                $sql = "SELECT * FROM placements WHERE status = 'active'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4"><div class="card"><img src="assets/uploads/' . htmlspecialchars($row['photo']) . '" class="card-img-top" alt="' . htmlspecialchars($row['student_name']) . '"><div class="card-body"><h5 class="card-title">' . htmlspecialchars($row['student_name']) . '</h5><p>Company: ' . htmlspecialchars($row['company']) . '</p><p>Package: ' . htmlspecialchars($row['package']) . '</p></div></div></div>';
                }
                ?>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
