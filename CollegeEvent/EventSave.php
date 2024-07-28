<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seminar2";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to fetch all saved events
$stmt = $conn->prepare("SELECT * FROM saved_events");
$stmt->execute();
$result = $stmt->get_result();

// Check if there are any saved events
if ($result->num_rows > 0) {
    // Loop through the saved events and display the details
    while ($row = $result->fetch_assoc()) {
        // Display the event details
        echo "<h3>Event Name: " . $row['eventName'] . "</h3>";
        echo "<p>Event Organizer: " . $row['eventOrganizer'] . "</p>";
        echo "<p>Event Category: " . $row['eventCategory'] . "</p>";
        echo "<p>Event Date: " . $row['eventDate'] . "</p>";
        echo "<p>Event Time: " . $row['eventTime'] . "</p>";
        echo "<p>Event Location: " . $row['eventLocation'] . "</p>";
        echo "<p>Event Description: " . $row['eventDescription'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p>No events saved.</p>";
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
