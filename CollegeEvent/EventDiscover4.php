<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mini_project';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Retrieve form data
$eventId = $_post['eventID'];
$eventName = $_POST['eventName'];
$eventOrganizer = $_POST['eventOrganizer'];
$eventCategory = $_POST['eventCategory'];
$eventDate = $_POST['eventDate'];
$eventTime = $_POST['eventTime'];

$sql = "SELECT * FROM events WHERE 1=1";

if (!empty($eventID)) {
  $sql .= " AND eventID LIKE '%$eventID%'";
}
if (!empty($eventName)) {
  $sql .= " AND eventName LIKE '%$eventName%'";
}
if (!empty($eventOrganizer)) {
  $sql .= " AND eventOrganizer LIKE '%$eventOrganizer%'";
}
if (!empty($eventCategory)) {
  $sql .= " AND eventCategory LIKE '%$eventCategory%'";
}
if (!empty($eventDate)) {
  $sql .= " AND eventDate = '$eventDate'";
}
if (!empty($eventTime)) {
  $sql .= " AND eventTime = '$eventTime'";
}

$result = $conn->query($sql);

echo '<h2 class="mb-4">Event Details</h2>';

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<div class="card mb-3">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title" style="font-size: 24px;">' . $row['eventName'] . '</h5>';
    echo '<p class="card-text"><strong>Event ID:</strong> ' . $row['eventID'] . '</p>';
    echo '<p class="card-text"><strong>Event Organizer:</strong> ' . $row['eventOrganizer'] . '</p>';
    echo '<p class="card-text"><strong>Category:</strong> ' . $row['eventCategory'] . '</p>';
    echo '<p class="card-text"><strong>Date:</strong> ' . $row['eventDate'] . '</p>';
    echo '<p class="card-text"><strong>Time:</strong> ' . $row['eventTime'] . '</p>';
    echo '<p class="card-text"><strong>Location:</strong> ' . $row['eventLocation'] . '</p>';
    echo '<p class="card-text"><strong>Description:</strong> ' . $row['eventDescription'] . '</p>';
    echo '</div>';
    echo '</div>';
  }
} else {
  echo '<div class="alert alert-danger">Event discovery unsuccessful.</div>';
}

$conn->close();
?>
