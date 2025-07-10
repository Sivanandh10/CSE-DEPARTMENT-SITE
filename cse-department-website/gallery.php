<?php
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container my-5">
    <h2>Gallery</h2>
    <div class="row">
        <?php
        $sql = "SELECT * FROM gallery";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            echo '<img src="/assets/uploads/' . htmlspecialchars($row['image']) . '" class="card-img-top" alt="' . htmlspecialchars($row['title']) . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($row['title']) . '</h5>';
            echo '<p class="card-text">' . (empty($row['description']) ? 'No description' : htmlspecialchars($row['description'])) . '</p>';
            echo '<p class="card-text"><small class="text-muted">Category: ' . (empty($row['category']) ? 'N/A' : htmlspecialchars($row['category'])) . '</small></p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<?php
require_once 'includes/footer.php';
?>