<?php
// Check if eventID is received via GET request
if (isset($_GET['eventID'])) {
    $eventID = $_GET['eventID'];

    // Establish a connection to your database
    $servername = "localhost"; // Replace with your server name
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "mini_project"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute a query to fetch event details based on eventID
    $sql = "SELECT * FROM events WHERE eventID = $eventID";
    $stmt = $conn->prepare($sql);
    // Assuming eventID is an integer, change the "i" if it's a different type
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query returned any results
    if ($result->num_rows > 0) {
        // Fetch event details as an associative array
        $row = $result->fetch_assoc();

        // Close the database connection
        $stmt->close();
        $conn->close();

        // Return event details in JSON format
        echo json_encode($row);
    } else {
        // No event found for the given eventID
        echo json_encode(array('error' => 'Event not found'));
    }
} else {
    // eventID parameter not received
    echo json_encode(array('error' => 'eventID parameter is missing'));
}
?>