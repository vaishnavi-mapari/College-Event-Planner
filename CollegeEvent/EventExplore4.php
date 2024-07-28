<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini_project";

// Get the event ID from the URL query parameters
//$eventId = $_GET['id'];

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to fetch event details by ID
$stmt = $conn->prepare("SELECT * FROM events WHERE eventName = 'None'");
//$stmt->bind_param("s", $eventId);
$stmt->execute();
$result = $stmt->get_result();
$eventDetails = $result->fetch_assoc();

// Close the database connection
$stmt->close();
$conn->close();

// Return the event details as JSON
header('Content-Type: application/json');
echo json_encode($eventDetails);
?>
