<?php
require_once('function.php');
$conn = connect();

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

$sql = "SELECT date, artist, description FROM event LIMIT 3 OFFSET $offset";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '  <div class="date-container"><h2>' . date('jS', strtotime($row['date'])) . '</h2></div>';
        echo '  <div class="card-content">';
        echo '    <h3>' . $row['artist'] . '</h3>';
        echo '    <p>' . $row['description'] . '</p>';
        echo '  </div>';
        echo '</div>';
    }
} else {
    echo '<p>No more events to display.</p>';
}

$conn->close();
?>
