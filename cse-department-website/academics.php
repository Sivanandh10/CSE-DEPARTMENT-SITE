<?php
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container my-5">
    <h2>Academic Programs</h2>
    <h3>B.Tech in Computer Science and Engineering</h3>
    <p>Our B.Tech program covers subjects like Data Structures, DBMS, and Computer Networks.</p>
    
    <h4>Curriculum</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Semester</th>
                <th>Credits</th>
                <th>Syllabus</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM courses";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['course_name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['course_code']) . '</td>';
                echo '<td>' . htmlspecialchars($row['semester']) . '</td>';
                echo '<td>' . htmlspecialchars($row['credits']) . '</td>';
                echo '<td>' . (empty($row['syllabus']) ? 'N/A' : htmlspecialchars($row['syllabus'])) . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php
require_once 'includes/footer.php';
?>