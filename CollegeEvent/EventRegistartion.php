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
$userName = $_POST['userName'];
$userEmailId = $_POST['userEmailId'];
$userPhoneNo = $_POST['userPhoneNo'];
$userBranch = $_POST['userBranch'];
$userYear = $_POST['userYear'];
$userDivision = $_POST['userDivision'];
$userQuery = $_POST['userQuery'];

$sql = "INSERT INTO register (eventID, userName, userEmailId , userPhoneNo , userBranch , userYear, userDivision, userQuery) VALUES ('$eventID,'$userName', '$userEmailId', '$userPhoneNo', '$userBranch', '$userYear', '$userDivision', '$userQuery')";

if ($conn->query($sql) === TRUE) {
  echo 'Event Register successful.';
} else {
  echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
?>
