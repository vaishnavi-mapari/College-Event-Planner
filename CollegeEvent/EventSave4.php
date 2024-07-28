<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seminar2";
// Get the event ID from the POST data
$eventId = $_POST['event_id'];

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to fetch event details by ID
$stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
$stmt->bind_param("i", $eventId);
$stmt->execute();
$result = $stmt->get_result();
$eventDetails = $result->fetch_assoc();

// Insert the event details into the 'saved_events' table
$insertStmt = $conn->prepare("INSERT INTO saved_events (eventName, eventOrganizer, eventCategory, eventDate, eventTime, eventLocation, eventDescription) VALUES (?, ?, ?, ?, ?, ?, ?)");
$insertStmt->bind_param("sssssss", $eventDetails['eventName'], $eventDetails['eventOrganizer'], $eventDetails['eventCategory'], $eventDetails['eventDate'], $eventDetails['eventTime'], $eventDetails['eventLocation'], $eventDetails['eventDescription']);

// Check if the event details were retrieved successfully
if ($result->num_rows > 0) {
    if ($insertStmt->execute()) {
        echo "Event Save successful.";
    } else {
        echo "Error occurred while saving the event.";
    }
} else {
    echo "Event not found.";
}

// Close the database connection
$stmt->close();
$insertStmt->close();
$conn->close();
?>
