<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mini_project';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}
$eventID = $_POST['eventID'];
$eventName = $_POST['eventName'];
$eventOrganizer = $_POST['eventOrganizer'];
$eventCategory = $_POST['eventCategory'];
$eventDate = $_POST['eventDate'];
$eventTime = $_POST['eventTime'];
$eventLocation = $_POST['eventLocation'];
$eventDescription = $_POST['eventDescription'];

$sql = "INSERT INTO events (eventID, eventName, eventOrganizer, eventCategory, eventDate, eventTime, eventLocation, eventDescription) VALUES ('$eventID','$eventName', '$eventOrganizer', '$eventCategory', '$eventDate', '$eventTime', '$eventLocation', '$eventDescription')";

if ($conn->query($sql) === TRUE) {
  echo 'Event Creation successful.';
} else {
  echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
?>
