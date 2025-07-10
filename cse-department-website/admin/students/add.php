<?php
session_start();
require_once '../../includes/config.php';
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $batch = htmlspecialchars($_POST['batch']);
    $roll_number = htmlspecialchars($_POST['roll_number']);
    $achievements = htmlspecialchars($_POST['achievements']);
    $photo = $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], '../../assets/uploads/' . $photo);
    
    $sql = "INSERT INTO students (name, batch, roll_number, achievements, photo, status, created_at) VALUES (?, ?, ?, ?, ?, 'active', NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $name, $batch, $roll_number, $achievements, $photo);
    $stmt->execute();
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student | CSE Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Add Student</h2>
        <form method="POST" action="add.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="batch" class="form-label">Batch</label>
                <input type="text" class="form-control" id="batch" name="batch" required>
            </div>
            <div class="mb-3">
                <label for="roll_number" class="form-label">Roll Number</label>
                <input type="text" class="form-control" id="roll_number" name="roll_number" required>
            </div>
            <div class="mb-3">
                <label for="achievements" class="form-label">Achievements</label>
                <textarea class="form-control" id="achievements" name="achievements"></textarea>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
