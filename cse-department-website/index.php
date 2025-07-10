<?php
session_start();
require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Official website of CSE Department, Erode Sengunthar Engineering College">
    <meta name="keywords" content="CSE, Erode Sengunthar, Computer Science, Engineering">
    <title>CSE Department | Erode Sengunthar Engineering College</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-poppins">
    <?php include 'includes/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="hero bg-gradient-to-r from-blue-600 to-indigo-700 text-white text-center py-16 animate-fade-in">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome to CSE Department</h1>
            <p class="text-lg md:text-xl">Empowering innovation through computer science since 1996</p>
        </div>
    </section>

    <!-- News Ticker -->
    <section class="news-ticker py-6 bg-white shadow-md">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-semibold mb-4">Latest News</h3>
            <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $sql = "SELECT * FROM news WHERE status = 'active' LIMIT 5";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $first = true;
                        while ($row = $result->fetch_assoc()) {
                            $active_class = $first ? 'active' : '';
                            $image_path = file_exists('assets/uploads/' . $row['image']) ? 'assets/uploads/' . htmlspecialchars($row['image']) : 'assets/images/placeholder.jpg';
                            echo '<div class="carousel-item ' . $active_class . '">';
                            echo '<div class="flex items-center justify-center p-4">';
                            echo '<img src="' . $image_path . '" class="w-24 h-24 object-cover rounded mr-4" alt="' . htmlspecialchars($row['title']) . '">';
                            echo '<p class="text-lg">' . htmlspecialchars($row['title']) . '</p>';
                            echo '</div>';
                            echo '</div>';
                            $first = false;
                        }
                    } else {
                        echo '<div class="carousel-item active"><p class="text-center text-gray-500">No news available.</p></div>';
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="stats py-12 bg-gray-200">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="animate-slide-up">
                    <h3 class="text-3xl font-bold text-blue-600">1000+</h3>
                    <p class="text-lg">Students</p>
                </div>
                <div class="animate-slide-up animation-delay-200">
                    <h3 class="text-3xl font-bold text-blue-600">50+</h3>
                    <p class="text-lg">Faculty</p>
                </div>
                <div class="animate-slide-up animation-delay-400">
                    <h3 class="text-3xl font-bold text-blue-600">95%</h3>
                    <p class="text-lg">Placement</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Events -->
    <section class="events py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-semibold mb-6">Upcoming Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php
                $sql = "SELECT * FROM events WHERE status = 'active' AND date >= CURDATE() LIMIT 3";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $image_path = file_exists('assets/uploads/' . $row['image']) ? 'assets/uploads/' . htmlspecialchars($row['image']) : 'assets/images/placeholder.jpg';
                        echo '<div class="card shadow-lg hover:shadow-xl transition-shadow duration-300 animate-fade-in">';
                        echo '<img src="' . $image_path . '" class="card-img-top h-48 object-cover" alt="' . htmlspecialchars($row['title']) . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title text-xl font-semibold">' . htmlspecialchars($row['title']) . '</h5>';
                        echo '<p class="text-gray-600">' . htmlspecialchars($row['description']) . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-center text-gray-500">No upcoming events available.</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>