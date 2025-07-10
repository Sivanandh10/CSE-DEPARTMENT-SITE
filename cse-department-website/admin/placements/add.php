<?php
session_start();
require_once '../../includes/config.php';
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_name = htmlspecialchars($_POST['student_name']);
    $company = htmlspecialchars($_POST['company']);
    $package = htmlspecialchars($_POST['package']);
    $year = $_POST['year'];
    $photo = $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], '../../assets/uploads/' . $photo);
    
    $sql = "INSERT INTO placements (student_name, company, package, year, photo, status, created_at) VALUES (?, ?, ?, ?, ?, 'active', NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssis', $student_name, $company, $package, $year, $photo);
    $stmt->execute();
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Placement | CSE Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Add Placement</h2>
        <form method="POST" action="add.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="student_name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="student_name" name="student_name" required>
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company" required>
            </div>
            <div class="mb-3">
                <label for="package" class="form-label">Package</label>
                <input type="text" class="form-control" id="package" name="package" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" required>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
