<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini_project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $events = [];
  while ($row = $result->fetch_assoc()) {
    $events[] = $row;
  }
} else {
  $events = [];
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($events);
?>