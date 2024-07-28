<?php
// Retrieve student profile from the database
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini_project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_SESSION["username"]; // Assuming you stored PRN in the session after successful login

$sql = "SELECT * FROM admin WHERE username = '$username'";
$result = $conn->query($sql);
$response = array();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['name'] = $row["name"];
    $response['mobile'] = $row["mobile"];
    $response['email'] = $row["email"];
    $response['username'] = $row["username"];

}

$conn->close();

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
