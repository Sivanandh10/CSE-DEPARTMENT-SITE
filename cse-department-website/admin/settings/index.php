<?php
session_start();
require_once '../../includes/config.php';
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $setting_name = htmlspecialchars($_POST['setting_name']);
    $setting_value = htmlspecialchars($_POST['setting_value']);
    
    $sql = "INSERT INTO settings (setting_name, setting_value, created_at) VALUES (?, ?, NOW()) ON DUPLICATE KEY UPDATE setting_value = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $setting_name, $setting_value, $setting_value);
    $stmt->execute();
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Settings | CSE Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="../dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="../faculty/index.php">Faculty</a></li>
                        <li class="nav-item"><a class="nav-link" href="../news/index.php">News</a></li>
                        <li class="nav-item"><a class="nav-link" href="../events/index.php">Events</a></li>
                        <li class="nav-item"><a class="nav-link" href="../gallery/index.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="../placements/index.php">Placements</a></li>
                        <li class="nav-item"><a class="nav-link active" href="index.php">Settings</a></li>
                        <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h2 class="mt-5">Manage Settings</h2>
                <form method="POST" action="index.php">
                    <div class="mb-3">
                        <label for="setting_name" class="form-label">Setting Name</label>
                        <input type="text" class="form-control" id="setting_name" name="setting_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="setting_value" class="form-label">Setting Value</label>
                        <input type="text" class="form-control" id="setting_value" name="setting_value" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Setting Name</th>
                            <th>Setting Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM settings";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr><td>' . htmlspecialchars($row['setting_name']) . '</td><td>' . htmlspecialchars($row['setting_value']) . '</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
